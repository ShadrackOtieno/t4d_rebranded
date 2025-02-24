<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Software;
use App\Category;
use App\Subcategory;
use Faker\Generator as Faker;

$factory->define(Software::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'price' => random_int(100, 10000),
        'category_id' => factory(Category::class)->states('software'),
        'highlights' => $faker->paragraph,
        'description' => $faker->paragraph,
        'subcategory_id' => function (array $software) {
            return Subcategory::where(
                'category_id', $software['category_id']
            )->inRandomOrder()->first()->id;
        },
        'featured' => random_int(0, 1)
    ];
});
