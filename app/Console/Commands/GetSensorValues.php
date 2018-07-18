<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Environment;
use App\Soil;

class GetSensorValues extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sensor:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get sensors value and store in DB';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        exec('python3 ~/project1/public/lib/GetValue.py a', $output);
        $hum = $output[0];
        $temp = $output[1];

        try {
            DB::beginTransaction();

            $env = new Environment();
            $env->temperature = $temp;
            $env->humidity = $hum;
            $env->save();

            $planter_id = [1, 2, 3, 4];
            $water = [$output[2], $output[3], $output[4], $output[5]];

            for ($i = 0; $i < count($planter_id); $i++) {
                $soil = new Soil();
                $soil->planter_id = $planter_id[$i];
                $soil->environment_id = $env->id;
                $soil->water = $water[$i];
                $soil->save();
            }

            DB::commit();

            print "success";
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            print "error";
        }
    }
}
