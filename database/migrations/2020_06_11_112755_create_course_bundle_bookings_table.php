<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseBundleBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_bundle_bookings', function (Blueprint $table) {

            $table->id();
            $table->unsignedInteger('course_bundle_id');
            $table->unsignedInteger('schedule_id');
            $table->unsignedInteger('customer_id');
            $table->string('schedule_type');
            $table->decimal('amount');
            $table->string('salutation');
            $table->string('name');
            $table->string('designation')->nullable();
            $table->unsignedInteger('company_id')->nullable();
            $table->string('country');
            $table->string('phone')->nullable();
            $table->string('personal_email');
            $table->string('work_email')->nullable();
            $table->unsignedInteger('approved_authority_id')->nullable();
            $table->string('currency');
            $table->text('learn_about_us')->nullable();
            $table->string('payment_method');
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
        Schema::dropIfExists('course_bundle_bookings');
    }
}
