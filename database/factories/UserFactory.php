<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Hotel;
use App\Customer;
use App\RoomType;
use App\Room;
use App\RoomCapacity;

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

    return [
        'name'      =>  $hotels[array_rand($hotels, 1)],
        'address'   =>  $faker->streetAddress,
        'city'      =>  $faker->city,
        'state'     =>  $faker->state,
        'country'   =>  $faker->country,
        'zipcode'   =>  $faker->postcode,
        'phone_number'  =>  $faker->phoneNumber,
        'email'     =>  $faker->companyEmail,
        'image'     =>  $faker->imageUrl($width = 640, $height = 480)
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
    $roomType       = RoomType::inRandomOrder()->first();
    $roomCapacity   = RoomCapacity::inRandomOrder()->first();
    $hotel          = Hotel::inRandomOrder()->first();


    return [
        'hotel_id'          =>  $hotel->id,
        'name'              =>  $faker->randomElement($array = array ('A1', 'B4', 'B2','C4', 'C5')),
        'room_type_id'      =>  $roomType->id,
        'room_capacity_id'  =>  $roomCapacity->id,
        'image'             =>  $faker->imageUrl($width = 640, $height = 280)
    ];
});