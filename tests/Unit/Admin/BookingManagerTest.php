<?php

namespace Tests\Unit\Admin;

use App\Room;
use App\User;
use App\Customer;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Booking;

class BookingManagerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testBookingAreCreatedCorrectly()
    {
        $customer   = Customer::first();
        $room       = Room::first();

        $data = [
            'room_id'       =>  $room->id,
            'date_start'    =>  '2017-06-27',
            'date_end'      =>  '2017-07-05',
            'customer_id'   =>  $customer->id,
            'total_price'   =>  690.50,
            'total_night'   =>  7
        ];
        
        $this->actingAs($customer->user)
                ->json('POST', '/admin/booking-manager', $data)
                ->assertStatus(302);
                
        
        

        // $this->assertTrue(true);
    }
}
