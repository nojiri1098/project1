<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeWeatherToStringTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weathers', function (Blueprint $table) {
            $table->string('weather')->change();
            $table->float('precipitation')->change();
            $table->float('temperature')->change();
            $table->float('humidity')->change();
            $table->float('windSpeed')->after('humidity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('weathers', function (Blueprint $table) {
          $table->integer('weather')->change();
          $table->integer('precipitation')->change();
          $table->integer('temperature')->change();
          $table->integer('humidity')->change();
          $table->dropColumn('windSpeed');
      });
    }
}
