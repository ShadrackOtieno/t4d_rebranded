<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Currency;
use Faker\Generator as Faker;

$factory->define(Currency::class, function (Faker $faker) {
    return [
        'code' => $faker->currencyCode,
        'description' => $faker->sentence,
        'tax' => random_int(0, 1),
        'bank_name' => $faker->company,
        'bank_account' => $faker->bankAccountNumber,
        'bank_branch' => $faker->city,
    ];
});
