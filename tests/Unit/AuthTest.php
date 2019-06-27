<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class AuthTest extends TestCase
{
    /**
     * Test Require email and login
     */
    public function testRequiresEmailAndLogin(){
        $this->json('POST', '/api/auth/login')
             ->assertStatus(422);            
    }
    /**
     * Test User login successfully
     */
    public function testUserLoginsSuccessfully(){
        
        $user = User::first();

        $payload = [
            "email"     => "bitcert@gmail.com",
            "password"  => "adefioye",
        ];
        
        $this->json('POST', '/api/auth/login', $payload)->assertStatus(200);
    }
}
