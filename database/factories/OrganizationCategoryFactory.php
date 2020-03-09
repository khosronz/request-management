<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OrganizationCategory;
use Faker\Generator as Faker;

$factory->define(OrganizationCategory::class, function (Faker $faker) {

    return [
        'user_id' => $faker->word,
        'category_id' => $faker->word,
        'organization_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
