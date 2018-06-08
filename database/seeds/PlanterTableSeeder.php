<?php

use Illuminate\Database\Seeder;

class PlanterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (count(DB::table('planters')->get()) === 0) {
            DB::table('planters')->insert([[
                'light' => 1,
                'rate' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ], [
                'light' => 2,
                'rate' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ], [
                'light' => 2,
                'rate' => 2,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ], [
                'light' => 2,
                'rate' => 3,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ]]);
        }
    }
}
