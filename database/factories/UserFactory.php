<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Staff;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

/** States */

$factory->state(App\User::class, 'trainer', [
    'role' => 'trainer',
]);

$factory->state(App\User::class, 'administrator', [
    'role' => 'administrator',
]);

$factory->state(App\User::class, 'accounts', [
    'role' => 'accounts',
]);

$factory->state(App\User::class, 'staff', [
    'role' => 'staff',
]);

$factory->state(App\User::class, 'customer', [
    'role' => 'customer',
]);

/** States callback */

$factory->afterCreating(App\User::class, function ($user, $faker) {
    
    factory(Staff::class)->create(['user_id' => $user->id]);
});
