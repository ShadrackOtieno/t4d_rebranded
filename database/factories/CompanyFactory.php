<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use App\Customer;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
    ];
});

/** Callback */

$factory->afterCreating(Company::class, function ($company) {

    $company->pastEmployees()->attach( array_combine(

        $employees = factory(Customer::class, random_int(2, 15))->create()->modelKeys(), 
        array_map( function ($value) {
            return ['status' => 'past'];
        }, $employees)
    ));

    $company->currentEmployees()->attach( array_combine(

        $employees = factory(Customer::class, random_int(2, 15))->create()->modelKeys(), 
        array_map( function ($value) {
            return ['status' => 'current'];
        }, $employees)
    ));
});
