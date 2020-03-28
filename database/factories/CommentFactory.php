<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {

    return [
        'equipment_id' => $faker->word,
        'user_id' => $faker->word,
        'title' => $faker->word,
        'desc' => $faker->text,
        'user_ip_address' => $faker->word,
        'email' => $faker->word,
        'parent_id' => $faker->word,
        'status' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
