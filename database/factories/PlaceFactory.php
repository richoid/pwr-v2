<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => 'Chico',
        'description' => 'City of Chico',
        'lat' => '39.7355216',
        'long' => '-121.8193352',
        'boundary' => '',
        'path' => '',
        'map_zoom_level' => 12,
        'bound_kml_url' => '',
        'time_zone' => 'America/Los_Angeles',
    ];
});
