<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {            
            $table->string('company')->nullable();           
            $table->string('phone')->nullable();           
            $table->string('no_of_employees')->nullable();  
            $table->string('type')->nullable();   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('company');
            $table->dropColumn('phone');
            $table->dropColumn('no_of_employees');
            $table->dropColumn('type');
        });
    }
}
