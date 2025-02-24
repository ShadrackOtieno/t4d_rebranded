<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TrainerIssue;
use App\Customer;
use App\User;
use Faker\Generator as Faker;

$factory->define(TrainerIssue::class, function (Faker $faker) {
    return [
        'customer_id' => factory(Customer::class), 
        'staff_id' => factory(User::class)->states('trainer'), 
        'course_id' => 1, 
        'message' => $faker->paragraph, 
        'status' => random_int(0, 1) ? 'resolved' : 'not resolved',
    ];
});
