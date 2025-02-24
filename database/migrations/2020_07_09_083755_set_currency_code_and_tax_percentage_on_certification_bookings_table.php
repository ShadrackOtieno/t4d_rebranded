<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetCurrencyCodeAndTaxPercentageOnCertificationBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('certification_bookings', function (Blueprint $table) {
            
            $table->unsignedInteger('tax_percentage')->default(0);
            $table->renameColumn('currency', 'currency_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('certification_bookings', function (Blueprint $table) {
            
            $table->dropColumn('tax_percentage');
            $table->renameColumn('currency_code', 'currency');
        });
    }
}
