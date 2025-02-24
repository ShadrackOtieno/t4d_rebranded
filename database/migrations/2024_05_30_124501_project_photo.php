<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProjectPhoto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Project_photos', function (Blueprint $table) {
            //
            $table->integer('id')->autoIncrement()->primary();
            $table->integer('project_id')->references('id')->on('project_pages')->onDelete('cascade');
            $table->longtext('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
