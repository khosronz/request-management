<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProtectionCategory;
use Faker\Generator as Faker;

$factory->define(ProtectionCategory::class, function (Faker $faker) {

    return [
        'category_id' => rand(1,10),
        'user_id' => rand(1,7),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
