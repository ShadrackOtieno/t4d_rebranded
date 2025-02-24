<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysicalBundlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physical_bundles', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('course_bundle_id');
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('tax')->default(0);
            $table->date('booking_start');
            $table->date('booking_end');
            $table->date('from');
            $table->date('to');
            $table->softDeletes();
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
        Schema::dropIfExists('physical_bundles');
    }
}
