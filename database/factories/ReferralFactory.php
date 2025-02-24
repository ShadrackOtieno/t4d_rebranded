<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Referral;
use Faker\Generator as Faker;

$factory->define(Referral::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'message' => $faker->paragraph,
        'course_id' => 1
    ];
});
