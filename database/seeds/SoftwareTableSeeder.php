<?php

use Illuminate\Database\Seeder;
use App\Software;
use Illuminate\Support\Facades\DB;

class SoftwareTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('software')->truncate();

        factory(Software::class, 15)->create();
    }
}
