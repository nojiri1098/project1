<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReformPlantersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('planters');

        Schema::create('planters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
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
        Schema::drop('planters');

        Schema::create('planters', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('light');
            $table->unsignedInteger('rate');
            $table->timestamps();
        });
    }
}
