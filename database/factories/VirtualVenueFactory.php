<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\VirtualVenue;
use App\Currency;
use Faker\Generator as Faker;

$factory->define(VirtualVenue::class, function (Faker $faker) {

    return [
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->unique()->phoneNumber,
        'tax' => random_int(0, 20),
    ];
});

/** after creating callback */

$factory->afterCreating(VirtualVenue::class, function (VirtualVenue $venue, Faker $faker) {

    $venue->currencies()->save(
        factory(Currency::class)->make(['code' => 'USD'])
    );

    $venue->currencies()->saveMany(
        factory(Currency::class, 4)->make()
    );
});

