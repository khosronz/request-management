<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\RoleUser;
use Faker\Generator as Faker;

$factory->define(RoleUser::class, function (Faker $faker) {

    return [
        'user_id' => $faker->word,
        'role_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
