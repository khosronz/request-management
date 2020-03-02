<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Orderdetail;
use Faker\Generator as Faker;

$factory->define(Orderdetail::class, function (Faker $faker) {

    return [
        'status' => rand(0,1),
        'equipment_id' => rand(1,100),
        'num' => $faker->randomDigitNotNull,
        'unit_price' => $faker->randomDigitNotNull,
        'order_id' => rand(1,100),
        'user_id' => \App\Enums\UserType::owner,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
