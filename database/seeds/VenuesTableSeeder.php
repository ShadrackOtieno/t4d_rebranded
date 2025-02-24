<?php

use Illuminate\Database\Seeder;
use App\Venue;
use Illuminate\Support\Facades\DB;

class VenuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->truncate();
        DB::table('currencies')->truncate();
        DB::table('venues')->truncate();

        factory(Venue::class, 15)->create();
    }
}
