<?php

use Illuminate\Database\Seeder;
use App\TrainerIssue;
use Illuminate\Support\Facades\DB;

class TrainerIssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trainer_issues')->truncate();

        factory(TrainerIssue::class, 15)->create();
    }
}
