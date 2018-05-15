<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 20),
        'client_id' => 1,
        'title' => $faker->words($nb = 3, $asText = false),
        'body' => $faker->sentences($nb = 3, $asText = false),
        'visible' => $faker->randomElement($array = array ('true','false')),
        'commentable' => $faker->randomElement($array = array ('post','report','task', 'profile')),
    ];
});


