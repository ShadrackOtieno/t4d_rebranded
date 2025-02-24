<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificationBundleBookingTourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certification_bundle_booking_tour', function (Blueprint $table) {

            $table->id();
            $table->unsignedInteger('certification_bundle_booking_id');
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
        Schema::dropIfExists('certification_bundle_booking_tour');
    }
}
