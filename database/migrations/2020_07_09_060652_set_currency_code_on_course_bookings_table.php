<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetCurrencyCodeOnCourseBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_bookings', function (Blueprint $table) {
            
            $table->renameColumn('currency', 'currency_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_bookings', function (Blueprint $table) {
            
            $table->renameColumn('currency_code', 'currency');
        });
    }
}
