<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use App\Category;
use App\Staff;
use App\Subcategory;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'category_id' => Category::course()->inRandomOrder()->first()->id,
        'subcategory_id' => function (array $course) {
            return Subcategory::where('category_id', $course['category_id'])->inRandomOrder()->first()->id;
        },
        'staff_id' => Staff::inRandomOrder()->first()->id,
        'event_types' => 'physical | virtual | elearning',
        'document' => 'course/brochure/doc.pdf',
        'cover' => 'course/cover/img.jpg',
        'description' => $faker->paragraph,
        'outline' => $faker->paragraph,
        'module' => $faker->paragraph
    ];
});
