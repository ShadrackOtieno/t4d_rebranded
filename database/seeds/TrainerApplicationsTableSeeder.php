<?php

use Illuminate\Database\Seeder;
use App\TrainerApplication;
use Illuminate\Support\Facades\DB;

class TrainerApplicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trainer_applications')->truncate();

        factory(TrainerApplication::class, 15)->create();
    }
}
