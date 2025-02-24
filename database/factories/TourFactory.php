<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tour;
use App\Category;
use App\Subcategory;
use Faker\Generator as Faker;

$factory->define(Tour::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'country' => $faker->country,
        'city' => $faker->city,
        'cost' => random_int(1000, 10000),
        'tax' => random_int(0, 16),
        'category_id' => factory(Category::class)->states('tour'),
        'subcategory_id' => function (array $tour) {
            return Subcategory::where(
                'category_id', $tour['category_id']
            )->inRandomOrder()->first()->id;
        },
        'schedule' => date('Y-m-d'),
        'description' => $faker->paragraph,
        'featured' => random_int(0, 1),
    ];
});
