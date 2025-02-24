<?php

use Illuminate\Database\Seeder;
use App\ProjectPage;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class ProjectPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(ProjectPage::class, 20)->create();
        /*DB::table('project_pages')->insert([
            'title' => Str::random(50),
            'excerpt' => Str::random(190),
            'description' => Str::random(500),
            'date_created' => now()
        ]);
        */
    }
}
