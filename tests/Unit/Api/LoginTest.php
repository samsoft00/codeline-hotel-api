<?php

namespace Tests\Unit\Api;

use App\User;
use Faker\Factory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testRequiresEmailAndLogin()
    {
        $this->json('POST', '/api/auth/login')
             ->assertStatus(422)
             ->assertJson([
                'message' => 'The given data was invalid.'
             ]);
    }

    public function testUserLoginsSuccessfully(){
        $faker = Factory::create();
        $payload = ['email' => $faker->email(), 'password' => $faker->password()];

        $user = factory(User::class)->create([
            'email'     => $payload['email'],
            'password'  => bcrypt($payload['password'])
        ]);
        
        $this->json('POST', '/api/auth/login', $payload)
             ->assertStatus(200)
             ->assertJsonStructure([
                'user',
                'access_token',
                'token_type',
                'expires_at'
             ]);
    }

    public function testsRequiresPasswordEmailAndName(){

        $this->json('POST', '/api/auth/register')
             ->assertStatus(422)
             ->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'first_name' => ['The first name field is required.'],
                    'last_name' => ['The last name field is required.'],
                    'email' => ['The email field is required.'],
                    'password' => ['The password field is required.']
                ]
             ]);
    }   

}
