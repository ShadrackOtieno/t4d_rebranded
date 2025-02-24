<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToserviceIndustriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_industries', function (Blueprint $table) {
            $table->text('group_training_description')->nullable();
            $table->text('team_building_description')->nullable();
            $table->text('services_description')->nullable();
            $table->text('software_description')->nullable();
            $table->text('tours_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_industries', function (Blueprint $table) {           
            $table->dropColumn('group_training_description');          
            $table->dropColumn('team_building_description');          
            $table->dropColumn('services_description');          
            $table->dropColumn('software_description');          
            $table->dropColumn('tours_description');
        });
    }
}
