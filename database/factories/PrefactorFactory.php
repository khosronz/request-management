<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Prefactor;
use Faker\Generator as Faker;

$factory->define(Prefactor::class, function (Faker $faker) {

    return [
        'user_id' => $faker->word,
        'order_id' => $faker->word,
        'factory_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
