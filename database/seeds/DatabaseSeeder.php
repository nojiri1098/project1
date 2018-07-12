<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PlanterTableSeeder::class);
        $this->call(SensorTableSeeder::class);
        $this->call(EnvironmentTableSeeder::class);
        $this->call(SoilTableSeeder::class);
        $this->call(WeatherTableSeeder::class);
        $this->call(PulseTableSeeder::class);
    }
}
