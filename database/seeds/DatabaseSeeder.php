<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Hotel;
use App\Customer;
use App\Room;
use App\Booking;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            RoomTypeSeeder::class,
            RoomCapacitySeeder::class,
            PriceSeeder::class,
            AdminSeeder::class
        ]);        

        factory(User::class, 5)->create();
        factory(Customer::class, 5)->create();
        factory(Hotel::class, 1)->create();
        factory(Room::class, 10)->create();
        factory(Booking::class, 10)->create();        
    }
}
