<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Organisation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Organisations', function (Blueprint $table) {
            //
            $table->integer('id')->autoIncrement()->primary();
            $table->integer('project_id')->references('id')->on('project_pages')->onDelete('cascade');
            $table->string('name',100);
            $table->longtext('photo');
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
