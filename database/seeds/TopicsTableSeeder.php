<?php

use Illuminate\Database\Seeder;
use App\Topic;
use App\Subcategory;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subcategory::whereHas('category', function ($query) {

        	$query->where('type', 'course');

        })->get()->each( function ($subcategory) {

        	$subcategory->topics()->saveMany(

        		factory(Topic::class, random_int(1, 20))->make()
        	);
        });
    }
}
