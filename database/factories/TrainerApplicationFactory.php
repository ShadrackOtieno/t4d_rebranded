<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TrainerApplication;
use Faker\Generator as Faker;

$factory->define(TrainerApplication::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'country' => $faker->country,
        'city' => $faker->city,
        'specialization' => $faker->jobTitle,
        'comment' => random_int(0, 1) ? $faker->paragraph : null,
        'document' => 'trainer_application/doc.pdf'
    ];
});
