<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class AuthController extends ApiBaseController
{
    public function register(Request $request){

        $request->validate([
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],            
        ]);

        $user = User::create([
            'email'     => $request->input('email'),
            'password'  => Hash::make($request->input('password')),            
        ]);

        $tokenResult = $user->createToken('authToken');

        return $this->respond([
            'user'          => $user, 
            'access_token'  => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' =>  Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
            ]);
        
    }

    public function login(Request $request){

        $request->validate([
            'email'     => ['required', 'string', 'email', 'max:255'],
            'password'  => ['required']
        ]);

        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials) ){
            return $this->setStatusCode(401)->respond(['message' => 'Incorrect login credentials']);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('authToken');
        $token = $tokenResult->token;

        if ($request->remember_me){
            $token->expires_at = Carbon::now()->addWeeks(1);
        }

        return $this->respond([
            'user'          => $user, 
            'access_token'  => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' =>  Carbon::parse($token->expires_at)->toDateTimeString()
            ]);        
        
    }

    public function logout(Request $request){
        $request->user()->token()->revoke();
        return $this->respond(['message' => 'Successfully logged out']);
    }
}
