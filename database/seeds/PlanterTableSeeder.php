<?php

use Illuminate\Database\Seeder;
use App\Planter;

class PlanterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Planter::truncate();

        DB::table('planters')->insert([[
            'id' => 1,
            'name' => '白熱灯',
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ], [
            'id' => 2,
            'name' => 'LED 1:1',
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ], [
            'id' => 3,
            'name' => 'LED 1:3',
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ], [
            'id' => 4,
            'name' => 'LED 3:1',
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")

        ]]);

    }
}
