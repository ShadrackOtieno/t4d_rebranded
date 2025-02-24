<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SoftwareServiceIndustry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_industry_software', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_industry_id');
            $table->unsignedBigInteger('software_id');
            $table->timestamps();

            $table->foreign('service_industry_id')
                ->references('id')
                ->on('service_industries')
                ->onDelete('cascade');

            $table->foreign('software_id')
                ->references('id')
                ->on('software')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_industry_software');
    }
}
