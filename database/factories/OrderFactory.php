<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {

    return [
        'title' => \Illuminate\Support\Str::uuid(),
        'verified' => rand(1,14),
        'desc' => \Ybazli\Faker\Facades\Faker::paragraph(),
        'user_id' => \App\Enums\UserType::owner,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
