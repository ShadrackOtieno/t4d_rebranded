<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReferencesToCourseServiceIndustryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_service_industry', function (Blueprint $table) {
            $table->foreign('service_industry_id')
                ->references('id')
                ->on('service_industries')
                ->onDelete('cascade');

            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_service_industry', function (Blueprint $table) {
            $table->dropForeign(['service_industry_id']);
            $table->dropForeign(['course_id']);
        });
    }
}
