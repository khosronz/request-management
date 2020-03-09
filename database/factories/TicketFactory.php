<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Ticket;
use Faker\Generator as Faker;

$factory->define(Ticket::class, function (Faker $faker) {

    return [
        'title' => \Ybazli\Faker\Facades\Faker::sentence(),
        'status' => \App\Enums\TicketStatus::open,
        'severity_id' => rand(1,3),
        'organization_id' => rand(1,6),
        'user_id' => rand(1,7),
        'desc' => \Ybazli\Faker\Facades\Faker::paragraph(),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
