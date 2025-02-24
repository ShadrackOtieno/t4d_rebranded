<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Topic;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Topic::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->paragraph,
        'slug' => function (array $topic) {

            return Str::slug($topic['name'], '-');
        },
    ];
});
