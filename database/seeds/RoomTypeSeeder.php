<?php

use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $capacity = ['Deluxe', 'Standard'];
        foreach($capacity as $cap){
            DB::table('room_type')->insert(['type' => $cap]);
        }
    }
}
