<?php

use Faker\Generator as Faker;

$factory->define(App\Manufacturer::class, function (Faker $faker) {
    return [
        'manufacturer_code' => $faker->unique()->numberBetween($min = 10000, $max = 99999),
        'manufacturer_name' => $faker->name,
        'manufacturer_owner' => $faker->name,
        'manufacturer_phone' => $faker->isbn10,
        'manufacturer_fax' => $faker->isbn10,
        'manufacturer_ZipCode' => $faker->postcode,
        'manufacturer_email' => $faker->unique()->safeEmail,
        'manufacturer_liaison' => $faker->name,
        'manufacturer_address' => $faker->address,
        'manufacturer_GUInumber' => $faker->randomNumber(),
    ];
});
