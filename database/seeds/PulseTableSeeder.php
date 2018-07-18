<?php

use Illuminate\Database\Seeder;
use App\Pulse;

class PulseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pulse::truncate();

        DB::table('pulses')->insert([[
            'id' => 1,
            'planter_id' => 1,
            'time' => 100,
            'unit' => 'ms',
            'duty' => 0.5,
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ], [
            'id' => 2,
            'planter_id' => 2,
            'time' => 100,
            'unit' => 'ms',
            'duty' => 0.5,
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ], [
            'id' => 3,
            'planter_id' => 3,
            'time' => 100,
            'unit' => 'ms',
            'duty' => 0.5,
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ], [
            'id' => 4,
            'planter_id' => 4,
            'time' => 100,
            'unit' => 'ms',
            'duty' => 0.5,
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ]]);
    }
}
