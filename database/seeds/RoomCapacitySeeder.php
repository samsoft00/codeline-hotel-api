<?php

use Illuminate\Database\Seeder;
use App\RoomCapacity;

class RoomCapacitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $capacity = ['Single', 'Double', 'Family'];
        foreach($capacity as $cap){
            DB::table('room_capacity')->insert(['name' => $cap]);
        }
    }
}
