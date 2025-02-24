<?php

use Illuminate\Database\Seeder;
use App\Course;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->truncate();

        factory(Course::class, 150)->create();
    }
}
