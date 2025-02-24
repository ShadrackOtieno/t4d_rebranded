<?php

use Illuminate\Database\Seeder;
use App\Tour;
use App\Customer;
use Illuminate\Support\Facades\App;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = App::make('Faker\Generator');

        Tour::all()->each( function ($tour) use ($faker) {

            $tour->reviews()->attach( Customer::inRandomOrder()->first()->id, [

                'comment' => $faker->paragraph,
                'rating' => random_int(1, 5),
            ]);
        });
    }
}
