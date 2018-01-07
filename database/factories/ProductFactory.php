<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    $common_id = App\Common_Code::pluck('id');
    $category_id = App\Product_Category::pluck('id');
    $manufacturer_id = App\Manufacturer::pluck('id');
    return [
        'product_code' => $faker->unique()->isbn10,
        'product_name' => $faker->name,
        'common_id' => $common_id->random(),
        'category_id' => $category_id->random(),
        'product_price' => $faker->numberBetween($min = 1, $max = 1000),
        'product_status' => $faker->boolean,
        'product_isitem' => $faker->boolean,
        'manufacturer_id' => $manufacturer_id->random(),

    ];
});
