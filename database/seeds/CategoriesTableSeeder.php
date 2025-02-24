<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        factory(App\Category::class, 15)->states('course')->create();
        factory(App\Category::class, 15)->states('tour')->create();
        factory(App\Category::class, 15)->states('software')->create();
    }
}
