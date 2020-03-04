<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Factoryaddress;
use Faker\Generator as Faker;

$factory->define(Factoryaddress::class, function (Faker $faker) {

    return [
        'factory_id' => rand(1,10),
        'desc' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
