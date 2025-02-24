<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseBookingTourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_booking_tour', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('course_booking_id');
            $table->unsignedInteger('tour_id');
            $table->unsignedInteger('participants');
            $table->decimal('cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_booking_tour');
    }
}
