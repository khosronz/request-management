<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Organization;
use Faker\Generator as Faker;

$factory->define(Organization::class, function (Faker $faker) {

    return [
        'title' => \Ybazli\Faker\Facades\Faker::sentence(),
        'desc' => \Ybazli\Faker\Facades\Faker::paragraph(),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
