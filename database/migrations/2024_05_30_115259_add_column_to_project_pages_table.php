<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToProjectPagesTable extends Migration
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
            
            $table->integer('budget')->nullable()->default(0)->after('excerpt');
            $table->string('location',100)->after('budget');
            $table->timestamp('started_on')->after('location');
            $table->timestamp('ended_on')->nullable()->after('started_on');
            $table->string('sector',100)->after('ended_on');
            $table->string('nature')->after('sector');
            $table->longtext('p_impacted')->after('nature');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('career_modules', function (Blueprint $table) {
            //
        });
    }
}
