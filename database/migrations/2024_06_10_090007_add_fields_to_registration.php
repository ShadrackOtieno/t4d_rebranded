<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToRegistration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_bookings', function (Blueprint $table) {
            $table->string('department')->nullable();
            $table->integer('no_department')->nullable();
            $table->integer('no_company')->nullable();
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
            $table->dropColumn('department');
            $table->dropColumn('no_department');
            $table->dropColumn('no_company');
        });
    }
}
