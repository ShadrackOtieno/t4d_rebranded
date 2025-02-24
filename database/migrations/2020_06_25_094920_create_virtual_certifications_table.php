<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVirtualCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virtual_certifications', function (Blueprint $table) {

            $table->id();
            $table->unsignedInteger('certification_id');
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
        Schema::dropIfExists('virtual_certifications');
    }
}
