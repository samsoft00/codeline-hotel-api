<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Room;
use App\User;
use App\Hotel;
use App\Price;
use App\Booking;
use App\Customer;
use App\RoomType;
use Carbon\Carbon;
use App\RoomCapacity;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        // 'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        // 'remember_token' => Str::random(10),
    ];
});

$factory->define(Hotel::class, function(Faker $faker){
    $hotels = [
        'Moxy NYC Chelsea',
        'Sago Hotel',
        'Arthouse Hotel New York City',
        'Hotel 50 Bowery NYC',
        'Kimpton Hotel Eventi',
        'The Mansfield Hotel',
        'Hotel Plaza Athenee',
        'Grand Hyatt New York',
        'The Lex NYC',
        'The Roxy Hotel Tribeca',
        'The Standard East Village',
        'The James New York- SoHo',
        'Walker Hotel Greenwich Village',
        'Flatiron Hotel',
        'Dream Downtown',
        'Royal Park Hotel and Hostel',
        'The London NYC',
        'Parker New York',
        'Skyline Hotel',
        'Mondrian Park Avenue'
    ];

    $hotel_image = [
        'premier_room_red_at_hotel.png',
        'f3e29c605a81097cb065165ef57c17a0.png',
        'sun-star-room-2-800x560.png',
        'home-carouselimg-4.png',
        'main-canopy-fireplace_1.jpg',
        'luxury-roomaw05-1954a49631c9073.png',
        '63b098ea_z.jpg',
        'aezhudv0m4dpxa7ffbcn.png',
        '849827_1.jpg',
        'Bre1-Resized.png',
        'rooms-hero.png'
    ];

    return [
        'name'      =>  $hotels[array_rand($hotels, 1)],
        'address'   =>  $faker->streetAddress,
        'city'      =>  $faker->city,
        'state'     =>  $faker->state,
        'country'   =>  $faker->country,
        'zipcode'   =>  $faker->postcode,
        'phone_number'  =>  $faker->phoneNumber,
        'email'     =>  $faker->companyEmail,
        'image'     =>  $hotel_image[array_rand($hotel_image, 1)]
    ];
});

$factory->define(Customer::class, function(Faker $faker){
    $user = User::inRandomOrder()->first();
    return [
        'user_id'       =>  $user->id,
        'first_name'    =>  $faker->firstName,
        'last_name'     =>  $faker->lastName,
        'address'       =>  $faker->streetAddress,
        'city'          =>  $faker->city,
        'country'       =>  $faker->country,
        'phone'         =>  $faker->phoneNumber,
        'fax'           =>  "",
        'email'         =>  $faker->freeEmail,
    ];
});

$factory->define(Room::class, function(Faker $faker){

    $roomImage = [
        'rt_lamana-executive-king_1502466269.png',
        '613027204_750x422.png',
        'xRoyal-Palm-Hotel-Executive-Suite.png.pagespeed.ic.qkYZKA_v7e.jpg',
        'premium-room.png',
        'Hotel-660x400.png',
        'premier_room_red_at_hotel.png',
        'f3e29c605a81097cb065165ef57c17a0.png',
        '63b098ea_z.jpg',
        'aezhudv0m4dpxa7ffbcn.png',
        '849827_1.jpg',
        'Bre1-Resized.png',
        'rooms-hero.png',
        'Continental_hotel_bedroom.jpg',
        'sun-star-room-2-800x560.png',
        'home-carouselimg-4.png',
        'main-canopy-fireplace_1.jpg',
        'luxury-roomaw05-1954a49631c9073.png'
    ];

    $roomType       = RoomType::inRandomOrder()->first();
    $roomCapacity   = RoomCapacity::inRandomOrder()->first();
    $hotel          = Hotel::inRandomOrder()->first();


    return [
        'hotel_id'          =>  $hotel->id,
        'name'              =>  $faker->randomElement($array = array ('A1', 'B4', 'B2','C4', 'C5')),
        'room_type_id'      =>  $roomType->id,
        'room_capacity_id'  =>  $roomCapacity->id,
        'image'             =>  $roomImage[array_rand($roomImage, 1)]
    ];
});

$factory->define(Booking::class, function(Faker $faker){
    $room = Room::with(['type'])->inRandomOrder()->first();
    $customer = Customer::inRandomOrder()->first();

    $start_date = Carbon::now()->subWeek(array_rand([2, 5, 1, 7, 3], 1));
    $end_date = Carbon::now()->addWeek(array_rand([2, 5, 1, 7, 3], 1));

    $diff = $end_date->diffInDays($start_date);

    $total_price = $diff * $room->type->cost->price; 

    return [
        'room_id'       =>  $room->id,
        'date_start'    =>  $start_date,
        'date_end'      =>  $end_date,
        'total_night'   =>  $diff,
        'total_price'   =>  $total_price,
        'customer_id'   =>  $customer->id
    ];
});