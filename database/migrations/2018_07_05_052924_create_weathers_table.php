<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeathersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('weathers')) {
            Schema::drop('weathers');
        }

        Schema::create('weathers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('weather');
            $table->double('precipitation');
            $table->double('temperature');
            $table->double('humidity');
            $table->double('wind_speed');
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
        Schema::drop('weathers');
    }
}
