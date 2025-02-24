<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Download;
use Faker\Generator as Faker;

$factory->define(Download::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'organization' => $faker->company,
        'designation' => $faker->jobTitle,
        'document' => 'Course Brochure',
    ];
});
