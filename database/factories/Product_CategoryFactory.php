<?php

use Faker\Generator as Faker;

$factory->define(App\Product_Category::class, function (Faker $faker) {
    return [
        //
        'category_name' => $faker->name,
        'parent_id' => '0',
    ];
});
