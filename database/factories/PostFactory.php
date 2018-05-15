<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 20),
        'title' => words($nb = 3, $asText = false),
        'body' => $faker->sentences($nb = 3, $asText = false),
        'start_date' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
        'end_date' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
        'publish_date' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
        'archive_date' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
        'alert_level' => $faker->randomElement($array = ['success','info', 'warning', 'danger']),
        'place_id' => $faker->numberBetween($min = 1, $max = 20),
        'notify' => $faker->randomElement($array = array ('true','false')),
        'status' => $faker->randomElement($array = array ('published','draft'))
        //type column is now in clientpost model
    ];
});
