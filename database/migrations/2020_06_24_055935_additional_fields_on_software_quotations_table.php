<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdditionalFieldsOnSoftwareQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('software_quotations', function (Blueprint $table) {
            
            $table->string('country')->nullable();
            $table->string('organization')->nullable();
            $table->unsignedInteger('licenses')->nullable();
            $table->text('additional_requirements')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('software_quotations', function (Blueprint $table) {
            
            $table->dropColumn(['country', 'organization', 'licenses', 'additional_requirements']);
        });
    }
}
