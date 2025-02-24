<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysicalCertificationBundlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physical_certification_bundles', function (Blueprint $table) {

            $table->id();
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('certification_bundle_id');
            $table->date('booking_start');
            $table->date('booking_end');
            $table->date('from');
            $table->date('to');
            $table->unsignedInteger('tax');
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
        Schema::dropIfExists('physical_certification_bundles');
    }
}
