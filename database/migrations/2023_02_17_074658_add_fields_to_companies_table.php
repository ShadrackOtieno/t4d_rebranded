<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('logo')->nullable();
            $table->string('office_address')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('industry')->nullable();
            $table->unsignedBigInteger('sector_id')->nullable();
            $table->unsignedBigInteger('segment_id')->nullable();
            $table->unsignedBigInteger('subsector_id')->nullable();
            

            $table->foreign('industry')
                ->references('id')
                ->on('industries')
                ->onDelete('cascade');
                
            $table->foreign('sector_id')
                ->references('id')
                ->on('sectors')
                ->onDelete('cascade');
            
            $table->foreign('subsector_id')
                ->references('id')
                ->on('sub_sectors')
                ->onDelete('cascade');
                
            $table->foreign('segment_id')
                ->references('id')
                ->on('segments')
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
        Schema::table('companies', function (Blueprint $table) {
        });
    }
}
