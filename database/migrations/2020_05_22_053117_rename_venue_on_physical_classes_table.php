<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameVenueOnPhysicalClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('physical_classes', function (Blueprint $table) {
            
            $table->renameColumn('venue_id', 'city_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('physical_classes', function (Blueprint $table) {
            
            $table->renameColumn('city_id', 'venue_id');
        });
    }
}
