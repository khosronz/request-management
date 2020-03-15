<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {

    return [
        'title' => \Ybazli\Faker\Facades\Faker::sentence(),
        'status' => rand(0,1),
        'ticket_id' => rand(1,100),
        'user_id' => rand(1,7),
        'desc' => \Ybazli\Faker\Facades\Faker::paragraph(),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
