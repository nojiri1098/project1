<?php

namespace App\Http\Controllers;

use App\Environment;
use App\Soil;
use App\Planter;
use Illuminate\Http\Request;
use App\Http\Requests;

class DashboardController extends Controller
{
    public function index()
    {
        // created_atが最新のレコードを取得する
        $env = Environment::latest()->get()->first();
        $soils = $env->soils()->get();
        $weather = Environment::$weatherTypeLabels[$env->weather];

        return view('contents.dashboard')->with(['env' => $env, 'soils' => $soils, 'weather' => $weather]);
    }

    /*
     * 温度，湿度，二酸化炭素濃度，天気，降水確率，土壌湿度を取得してDBに格納する
     */
    public function storeCensorValue()
    {
        // あとでArduinoの値と置き換える
        $temp    = 20;
        $hum     = 50;
        $co2     = 1000;
        $weather = 1;
        $rain    = 50;

        $env = new Environment();
        $env->temperature = $temp;
        $env->humidity = $hum;
        $env->co2 = $co2;
        $env->weather = $weather;
        $env->rain = $rain;
        $env->save();

        $planter_id = [1,2,3,4];
        $water = [1000,2000,1200,1234];

        for ($i = 0; $i < count($planter_id); $i++) {
            $soil = new Soil();
            $soil->planter_id = $planter_id[$i];
            $soil->environment_id = $env->id;
            $soil->water = $water[$i];
            $soil->save();
        }

        return redirect()->route('dashboard')->with(['success', '成功']);
    }
}
