<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdminstrationDetailsOnCourseBundlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_bundles', function (Blueprint $table) {
            
            $table->string('adminstration_details')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_bundles', function (Blueprint $table) {
            
            $table->dropColumn('adminstration_details');
        });
    }
}
