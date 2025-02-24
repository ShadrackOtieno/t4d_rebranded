<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProjectPage;
use Faker\Generator as Faker;

$factory->define(ProjectPage::class, function (Faker $faker) {
    return [
        //Trial
        'title' => implode($faker->words(5)),
        'excerpt' => implode($faker->sentences(2)),
        'description' => implode($faker->paragraphs(3)),
        'date_created' => now()
    ];
});
