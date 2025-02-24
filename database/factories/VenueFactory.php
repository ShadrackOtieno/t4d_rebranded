<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Venue;
use App\City;
use App\Currency;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(Venue::class, function (Faker $faker) {
    return [
        'country' => $faker->country,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->unique()->phoneNumber,
        'tax' => random_int(0, 20),
    ];
});

/** after creating callback */

$factory->afterCreating(Venue::class, function (Venue $venue, Faker $faker) {

	$venue->cities()->saveMany(
        factory(City::class, 15)->make()
    );

    $venue->currencies()->save(
        factory(Currency::class)->make(['code' => 'USD'])
    );

     $venue->currencies()->saveMany(
        factory(Currency::class, random_int(2, 5))->make()
    );
});
