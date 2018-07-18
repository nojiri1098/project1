<?php

use Illuminate\Database\Seeder;
use App\Sensor;

class SensorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sensor::truncate();

        DB::table('sensors')->insert([[
            'planter_id' => 0,
            'name' => 'temperature',
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ], [
            'planter_id' => 0,
            'name' => 'humidity',
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ], [
            'planter_id' => 1,
            'name' => 'soil_water',
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ], [
            'planter_id' => 2,
            'name' => 'soil_water',
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ], [
            'planter_id' => 3,
            'name' => 'soil_water',
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ], [
            'planter_id' => 4,
            'name' => 'soil_water',
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ]]);
    }
}
