<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToProjectPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_pages', function (Blueprint $table) {
            //
            $table->string('client',100)->after('title');
            $table->string('client_logo',250)->after('client');
            // $table->string('region',200)->nullable()->default('')->after('location');
            // $table->string('industry',200)->nullable()->after('sector');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_pages', function (Blueprint $table) {
            //
        });
    }
}
