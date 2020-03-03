<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Factorytell;
use Faker\Generator as Faker;

$factory->define(Factorytell::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'tellnumber' => $faker->phoneNumber,
        'desc' => $faker->text,
        'factory_id' => rand(1,10),
        'telltype_id' => rand(1,3),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
