<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Equipment;
use Faker\Generator as Faker;

$factory->define(Equipment::class, function (Faker $faker) {

    return [
        'title' => \Ybazli\Faker\Facades\Faker::sentence(),
        'desc' => \Ybazli\Faker\Facades\Faker::paragraph(),
        'product_visits' => $faker->randomDigitNotNull,
        'user_id' => \App\Enums\UserType::master,
        'category_id' => rand(1,13),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
