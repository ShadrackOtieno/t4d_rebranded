<?php

use Illuminate\Database\Seeder;
use App\Customer;
use Illuminate\Support\Facades\DB;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->truncate();

        factory(Customer::class, 15)->create();
    }
}
