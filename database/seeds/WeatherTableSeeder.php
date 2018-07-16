<?php

use Illuminate\Database\Seeder;

class WeatherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (count(DB::table('weathers')->get()) === 0) {
            DB::table('weathers')->insert([[
                'weather' => 'default',
                'precipitation' => 70,
                'temperature' => 20,
                'humidity' => 70,
                'wind_speed' => 10,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ],
            ]);
        }
    }
}
