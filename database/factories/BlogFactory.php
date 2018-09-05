<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Blog::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('zh_CN');
    $date_time = $faker->date . ' ' . $faker->time;
    return [
        'content'       =>  $faker->realText($maxNbChars = 200, $indexSize = 2),
        'title'         =>  $faker->realText(),
        'excerpt'       =>  $faker->realText(),
        'created_at'  =>  $date_time,
        'updated_at'  =>  $date_time,
    ];
});
