<?php

use Illuminate\Database\Seeder;
use App\Tour;
use Illuminate\Support\Facades\DB;

class ToursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tours')->truncate();

        factory(Tour::class, 15)->create();
    }
}
