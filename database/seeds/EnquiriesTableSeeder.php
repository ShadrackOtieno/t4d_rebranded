<?php

use Illuminate\Database\Seeder;
use App\Enquiry;
use Illuminate\Support\Facades\DB;

class EnquiriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enquiries')->truncate();

        factory(Enquiry::class, 15)->create();
    }
}
