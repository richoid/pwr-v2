<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'title' => 'A Test Comment',
        'body' => 'This is a test comment.',
        'visible' => 'false'
    ];
});
