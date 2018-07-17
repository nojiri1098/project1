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
            'name' => '赤:青　1:1',
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ], [
            'id' => 2,
            'name' => '赤:青　1:3',
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ], [
            'id' => 3,
            'name' => '赤:青　3:1',
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ], [
            'id' => 4,
            'name' => '赤:青　3:1',
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")

        ]]);

    }
}
