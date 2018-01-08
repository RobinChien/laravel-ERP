<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        //
        'customer_code' => $faker->unique()->numberBetween($min = 10000, $max = 99999),
        'customer_name' => $faker->name,
        'customer_owner' => $faker->name,
        'customer_phone' => $faker->isbn10,
        'customer_fax' => $faker->isbn10,
        'customer_ZipCode' => $faker->postcode,
        'customer_email' => $faker->unique()->safeEmail,
        'customer_liaison' => $faker->name,
        'customer_address' => $faker->address,
        'customer_GUInumber' => $faker->randomNumber(),
    ];
});
