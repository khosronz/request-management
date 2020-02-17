<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Telltype;
use Faker\Generator as Faker;

$factory->define(Telltype::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'desc' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
