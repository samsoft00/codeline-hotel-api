<?php

namespace Tests\Unit\Api;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Customer;

class LogoutTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testUserIsLoggedOutProperly()
    {
        $customer   = factory(Customer::class)->create();
        $token  = $customer->user->createToken('authToken');
        
        $headers = ['Authorization' => "Bearer $token->accessToken"];
        $this->json('GET', '/api/auth/logout', [], $headers)
             ->assertStatus(200)
             ->assertJson([
                'message' => 'Successfully logged out'
             ]);
    }
}
