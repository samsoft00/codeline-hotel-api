<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Hotel;
use App\Customer;
use App\Room;

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
            RoomCapacitySeeder::class
        ]);

        factory(User::class, 20)->create();
        factory(Customer::class, 20)->create();
        factory(Hotel::class, 30)->create();
        factory(Room::class, 100)->create();
    }
}
