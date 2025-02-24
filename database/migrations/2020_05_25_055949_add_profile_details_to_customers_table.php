<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileDetailsToCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            
            $table->string('designation')->nullable();
            $table->unsignedInteger('company_id')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->string('work_email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            
            $table->dropColumn(['designation', 'company_id', 'country', 'phone', 'work_email']);
        });
    }
}
