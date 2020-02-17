<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Factorytell;
use Faker\Generator as Faker;

$factory->define(Factorytell::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'tellnumber' => $faker->word,
        'desc' => $faker->text,
        'factory_id' => $faker->word,
        'telltype_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
