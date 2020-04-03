<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Prefactor;
use Faker\Generator as Faker;

$factory->define(Prefactor::class, function (Faker $faker) {

    return [
        'user_id' => \App\Enums\UserType::supplier,
        'order_id' => rand(1,100),
        'factory_id' => rand(1,10),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
