<?php

use Illuminate\Database\Seeder;
use App\VirtualVenue;
use Illuminate\Support\Facades\DB;

class VirtualVenuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->where('venue_type', 'App\VirtualVenue')->delete();
    	DB::table('virtual_venues')->truncate();

        factory(VirtualVenue::class)->create();
    }
}
