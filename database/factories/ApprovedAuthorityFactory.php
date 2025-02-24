<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ApprovedAuthority;
use App\Company;
use Faker\Generator as Faker;

$factory->define(ApprovedAuthority::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'company_id' => factory(Company::class),
        'designation' => $faker->jobTitle,
        'phone' => $faker->phoneNumber,
    ];
});
