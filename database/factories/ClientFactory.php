<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
    return [
        'client_short' => 'chico',
        'client_name' => 'Chico Parks',
        'parent_org' => 'City of Chico',
        'client_contact_id' => '1',
        'license_start_date' => '2018-03-01 00:00:01',
        'license_expire_date' => '2020-03-01 00:00:01',
        'client_status' => '0',
        'client_phone' => '(530) 896-7800',
        'street_address' => '965 Fir Street', 
        'address_locality' => 'Chico', 
        'address_region' => 'Butte', 
        'postal_code' => '95928',
        'area_served' => 1,
        'map_zoom_level' => '12',
        'lat' => '39.7355216',
        'long' => '-121.8193352',
        'bound_kml_url' => '',
        'time_zone' => 'America/Los_Angeles',
        'require_reg' => '0',
        'brand1' => 'Chico Parks',
        'brand2' => 'Chico, California',
        'brand1_size' => '3.200',
        'brand2_size' => '2.000',
    ];
});
