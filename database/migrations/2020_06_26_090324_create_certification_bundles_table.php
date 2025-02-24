<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificationBundlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certification_bundles', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->string('code');
            $table->boolean('featured')->default(false);
            $table->unsignedInteger('certifying_body_id')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('subcategory_id')->nullable();
            $table->unsignedInteger('topic_id')->nullable();
            $table->string('event_types');
            $table->string('cover')->nullable();
            $table->text('description')->nullable();
            $table->text('outline')->nullable();
            $table->text('module')->nullable();
            $table->text('exam')->nullable();
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
        Schema::dropIfExists('certification_bundles');
    }
}
