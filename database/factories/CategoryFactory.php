<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Subcategory;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph,
    ];
});

/** States */

$factory->state(App\Category::class, 'course', ['type' => 'course']);

$factory->state(App\Category::class, 'tour', ['type' => 'tour']);

$factory->state(App\Category::class, 'software', ['type' => 'software']);

/** States callback */

$factory->afterCreatingState(App\Category::class, 'course', function ($category, $faker) {
    
    $category->subcategories()->saveMany(

        factory(Subcategory::class, 25)->make()
    );
});

$factory->afterCreatingState(App\Category::class, 'tour', function ($category, $faker) {
    
    $category->subcategories()->saveMany(

        factory(Subcategory::class, 25)->make()
    );
});

$factory->afterCreatingState(App\Category::class, 'software', function ($category, $faker) {
    
    $category->subcategories()->saveMany(

        factory(Subcategory::class, 25)->make()
    );
});
