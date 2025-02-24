<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdditionalFieldsOnTourBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tour_bookings', function (Blueprint $table) {
            
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->string('country')->nullable();
            $table->boolean('meals')->nullable();
            $table->string('transport')->nullable();
            $table->boolean('airport_pickup')->nullable();
            $table->boolean('accommodation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tour_bookings', function (Blueprint $table) {
            
            $table->dropColumn(['from', 'to', 'country', 'meals', 'transport', 'airport_pickup', 'accommodation']);
        });
    }
}
