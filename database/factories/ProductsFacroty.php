<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Product::class, function (Faker $faker) {
    $date_time = $faker->date . ' ' . $faker->time;
    return [
        'name'  =>  $faker->streetName,
        'created_at' => $date_time,
        'updated_at' => $date_time
    ];
});
