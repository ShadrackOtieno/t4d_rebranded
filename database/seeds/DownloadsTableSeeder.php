<?php

use Illuminate\Database\Seeder;
use App\Download;
use Illuminate\Support\Facades\DB;

class DownloadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('downloads')->truncate();

        factory(Download::class, 15)->create();
    }
}
