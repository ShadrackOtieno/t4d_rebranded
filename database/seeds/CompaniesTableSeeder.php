<?php

use Illuminate\Database\Seeder;
use App\Company;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->truncate();

        factory(Company::class, 15)->create();
    }
}
