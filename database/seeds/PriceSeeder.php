<?php

use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roomTypes = RoomType::all();
        
        $priceArray = [
            'Deluxe'    => 156, 
            'Standard'  => 120
        ];
        
        foreach ($roomTypes as $type) {
            DB::table('price')->insert(['room_type_id' => $type->type, 'price' => $priceArray[$type->type]]);
        }
    }
}
