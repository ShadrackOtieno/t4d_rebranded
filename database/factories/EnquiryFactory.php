<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Enquiry;
use Faker\Generator as Faker;

$factory->define(Enquiry::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'message' => $faker->paragraph,
        'course_id' => 1
    ];
});
