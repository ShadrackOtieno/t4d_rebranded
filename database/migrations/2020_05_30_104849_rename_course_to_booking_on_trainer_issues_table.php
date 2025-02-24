<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameCourseToBookingOnTrainerIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trainer_issues', function (Blueprint $table) {
            
            $table->renameColumn('course_id', 'booking_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trainer_issues', function (Blueprint $table) {
            
            $table->renameColumn('booking_id', 'course_id');
        });
    }
}
