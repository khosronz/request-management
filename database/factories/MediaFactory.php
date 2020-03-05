<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Media;
use Faker\Generator as Faker;

$factory->define(Media::class, function (Faker $faker) {

    return [
        'user_id' => rand(1,7),
        'title' => $faker->word,
        'desc' => $faker->text,
        'alt' => $faker->word,
        'url' => $faker->url,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
