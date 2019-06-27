<?php

namespace Tests\Unit\Api;

use Faker\Factory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testsRegistersSuccessfully()
    {
        $faker = Factory::create();

        $payload = [
            'first_name'=> $faker->firstName(),
            'last_name' => $faker->lastName(),
            'phone'     =>  $faker->phoneNumber(),
            'email'     => $faker->email,
            'password'  => 'codeline1245',
            'password_confirmation' => 'codeline1245',
        ];

        $this->json('POST', '/api/auth/register', $payload)
             ->assertStatus(200)
             ->assertJsonStructure([
                'user',
                'access_token',
                'token_type',
                'expires_at'
             ]);
    }
}
