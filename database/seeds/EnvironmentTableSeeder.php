<?php

use Illuminate\Database\Seeder;

class EnvironmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (count(DB::table('environments')->get()) === 0) {
            DB::table('environments')->insert([[
                'id' => 1,
                'temperature' => 20,
                'humidity' => 60,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ], [
                'id' => 2,
                'temperature' => 30,
                'humidity' => 50,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ], [
                'id' => 3,
                'temperature' => 0,
                'humidity' => 26,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ], [
                'id' => 4,
                'temperature' => -5,
                'humidity' => 28,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ], [
                'id' => 5,
                'temperature' => 23,
                'humidity' => 23,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ], [
                'id' => 6,
                'temperature' => -10,
                'humidity' => 100,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ]]);
        }
    }
}
