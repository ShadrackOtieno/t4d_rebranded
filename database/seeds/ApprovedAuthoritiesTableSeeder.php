<?php

use Illuminate\Database\Seeder;
use App\ApprovedAuthority;

class ApprovedAuthoritiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('approved_authorities')->truncate();

        factory(ApprovedAuthority::class, 15)->create();
    }
}
