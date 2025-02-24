<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_pages', function (Blueprint $table) {
                $table->id()->integer()->primary()->autoIncrement();
                $table->string('title',100);
                $table->string('excerpt',250);
                $table->integer('budget')->nullable()->default(0);
                $table->string('location',100);
                $table->string('region',200)->nullable()->default('');
                $table->timestamp('started_on');
                $table->timestamp('ended_on')->nullable();
                $table->string('sector',100);
                $table->string('industry',200)->nullable();
                $table->string('nature',191);
                $table->bigInteger('p_impacted')->default(0);
                $table->longtext('description');
                $table->string('image',250)->nullable();
                $table->timestamp('date_created')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->timestamp('date_updated')->default(DB::raw('CURRENT_TIMESTAMP'))->onUpdate(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_pages');
    }
}
