<?php

use Illuminate\Database\Seeder;
use App\Environment;

class EnvironmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Environment::truncate();

        for ($i = 1;$i <= 150;$i++) {

            DB::table('environments')->insert([
                'id' => $i,
                'temperature' => rand(20,30),
                'humidity' => rand(70,100),
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ]);
        }
    }
}
