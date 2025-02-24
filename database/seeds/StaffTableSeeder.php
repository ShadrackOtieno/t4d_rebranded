<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staff')->truncate();
        
        factory(User::class, 15)->states('trainer')->create();
        factory(User::class, 15)->states('administrator')->create();
        factory(User::class, 15)->states('staff')->create();
        factory(User::class, 15)->states('accounts')->create();
    }
}
