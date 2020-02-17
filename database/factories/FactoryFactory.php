<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Factory;
use Faker\Generator as Faker;

$factory->define(Factory::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'desc' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
