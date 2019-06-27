<?php

namespace Tests\Unit\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Customer;
use App\Room;
use Carbon\Carbon;

class HotelBookingTest extends TestCase
{

    public function testLoginRequiredForBooking(){
        $room = factory(Room::class)->create();
        $customer   = factory(Customer::class)->create();

        $payload = [
            'room_id'       =>  $room->id,
            'customer_id'   =>  $customer->id,
            'total_price'   =>  650.33,
            'total_night'   =>  2,
            'start_date'    =>  Carbon::now(),
            'end_date'      =>  Carbon::now()->addDays(5)
        ];

        $this->json('POST', '/api/book-room', $payload)
             ->assertStatus(401);
    }

    public function testRequiresStartDateAndEndDate(){

        $room = factory(Room::class)->create();

        $customer   = factory(Customer::class)->create();
        $token  = $customer->user->createToken('authToken');
        
        $headers = ['Authorization' => "Bearer $token->accessToken"];

        $payload = [
            'room_id'       =>  $room->id,
            'customer_id'   =>  $customer->id,
            'total_price'   =>  650.33,
            'total_night'   =>  2
        ];

        $this->json('POST', '/api/book-room', $payload, $headers)
             ->assertStatus(422)
             ->assertJson([
                'message' => 'The given data was invalid.',
                'errors'    =>  [
                    'start_date' => ['The start date field is required.'],
                    'end_date' => ['The end date field is required.']
                ]
             ]);             

    }

    public function testRequiresTotalPriceAndTotalNight(){
        $room = factory(Room::class)->create();

        $customer   = factory(Customer::class)->create();
        $token  = $customer->user->createToken('authToken');
        
        $headers = ['Authorization' => "Bearer $token->accessToken"];
        $payload = [
            'room_id'       =>  $room->id,
            'customer_id'   =>  $customer->id,
            'start_date'    =>  Carbon::now(),
            'end_date'      =>  Carbon::now()->addDays(5)
        ];
        
        $this->json('POST', '/api/book-room', $payload, $headers)
             ->assertStatus(422)
             ->assertJson([
                'message' => 'The given data was invalid.',
                'errors'    =>  [
                    'total_price' => ['The total price field is required.'],
                    'total_night' => ['The total night field is required.']
                ]
             ]);        
    }

    /**
     * A basic unit test hotel successfuly book.
     *
     * @return void
     */
    public function testHotelSuccessfulBooking()
    {
        $room = factory(Room::class)->create();
        $customer   = factory(Customer::class)->create();

        $token  = $customer->user->createToken('authToken');
        $headers = ['Authorization' => "Bearer $token->accessToken"];

        $start_date = Carbon::now();
        $end_date = Carbon::now()->addDays(5);

        $diff = $end_date->diffInDays($start_date);

        $payload = [
            'room_id'       =>  $room->id,
            'customer_id'   =>  $customer->id,
            'total_price'   =>  650.33,
            'total_night'   =>  $diff,
            'start_date'    =>  $start_date,
            'end_date'      =>  $end_date
        ];

        $this->json('POST', '/api/book-room', $payload, $headers)
             ->assertStatus(200)
            ->assertJsonStructure([
                'id', 'room_id', 'customer_id', 'date_start', 'date_end', 'total_price', 'total_night'
            ]);
    }
}
