<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PrefactorDetail;
use Faker\Generator as Faker;

$factory->define(PrefactorDetail::class, function (Faker $faker) {

    return [
        'status' => $faker->word,
        'equipment_id' => $faker->word,
        'num' => $faker->randomDigitNotNull,
        'unit_price' => $faker->word,
        'prefactor_id' => $faker->word,
        'user_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
