<?php

use Illuminate\Database\Seeder;
use App\Referral;
use Illuminate\Support\Facades\DB;

class ReferralsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('referrals')->truncate();

        factory(Referral::class, 15)->create();
    }
}
