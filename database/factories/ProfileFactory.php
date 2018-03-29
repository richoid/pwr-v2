<?php

use Faker\Generator as Faker;
use App\Profile;
$factory->define(App\Profile::class, function (Faker $faker) {
    $subYears = rand( 18, 80);

    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 20), 
        'email' => $faker->unique()->safeEmail, 
        'first_name' => $faker->firstName, 
        'last_name' => $faker->lastName, 
        'phone_m' => $faker->phoneNumber, 
        'phone_h' => $faker->phoneNumber, 
        'phone_w' => $faker->phoneNumber, 
        'phone_prefs' => $faker->randomElement($array = array ('mobile','home','work')), 
        'street_address' => $faker->streetAddress, 
        'address_locality' => $faker->city, 
        'address_region' => $faker->stateAbbr, 
        'postal_code' => $faker->postcode, 
        'avatar_url' => '/assets/images/users/avatar/1234.jpg', 
        'birth_date' => Carbon\Carbon::now()->subYears($subYears)
    ];
});
