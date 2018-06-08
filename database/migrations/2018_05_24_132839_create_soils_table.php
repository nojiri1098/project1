<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soils', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('planter_id');
            $table->unsignedInteger('environment_id');
            $table->unsignedInteger('water');
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
        Schema::drop('soils');
    }
}
