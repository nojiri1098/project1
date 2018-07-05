<?php

use Illuminate\Database\Seeder;

class SoilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (count(DB::table('soils')->get()) === 0) {
            for ($i = 0;$i < 6;$i++) {
                DB::table('soils')->insert([[
                    'id' => 1 + 4 * $i,
                    'planter_id' => 1,
                    'environment_id' => $i + 1,
                    'water' => 700,
                    'created_at' => date("Y-m-d h:i:s"),
                    'updated_at' => date("Y-m-d h:i:s")
                ], [
                    'id' => 2 + 4 * $i,
                    'planter_id' => 2,
                    'environment_id' => $i + 1,
                    'water' => 100,
                    'created_at' => date("Y-m-d h:i:s"),
                    'updated_at' => date("Y-m-d h:i:s")
                ], [
                    'id' => 3 + 4 * $i,
                    'planter_id' => 3,
                    'environment_id' => $i + 1,
                    'water' => 500,
                    'created_at' => date("Y-m-d h:i:s"),
                    'updated_at' => date("Y-m-d h:i:s")
                ], [
                    'id' => 4 + 4 * $i,
                    'planter_id' => 4,
                    'environment_id' => $i + 1,
                    'water' => 1000,
                    'created_at' => date("Y-m-d h:i:s"),
                    'updated_at' => date("Y-m-d h:i:s")
                ]]);
            }
        }
    }
}
