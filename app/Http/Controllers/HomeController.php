<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Environment;
use App\Weather;
use App\Pulse;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;

class HomeController extends Controller
{
    public function index()
    {
        $envs = Environment::limit(144)->orderBy('created_at', 'DESC')->get();
        $temperatures = [];
        $humidities = [];

        foreach ($envs as $key => $env) {
            $temperatures[$key] = $env->temperature;
            $humidities[$key] = $env->humidity;
        }

        $data = Weather::orderBy('created_at', 'DESC')->first();

        return view('contents.index')->with(['envs' => $envs, 'temperatures' => $temperatures, 'humidities' => $humidities, 'weather' => $data]);
    }

    public function showPulse()
    {
        $pulses = Pulse::all();

        return view('contents.pulse')->with(['pulses' => $pulses]);
    }

    public function updatePulse(Request $request)
    {
        DB::table('pulses')->where('planter_id', $request->planter_id)
            ->update(['time' => $request->time, 'unit' => $request->unit, 'duty' => $request->duty]);

        $time = $request->unit == 'ms' ? $request->time : $request->time / 1000;
        exec('python3 ~/project1/public/lib/GetValue.py p ' . $request->duty . ' ' . $time, $output);

        return redirect('pulse');
    }

    /*
     * 天気と降水確率を取得する
     */
    public function getWeather()
    {
        try {
            $baseUrl = 'https://api.forecast.io/forecast';
            $api = env('WEATHER_API');
            $Oita['latitude']  = env('WEATHER_LATITUDE');
            $Oita['longitude'] = env('WEATHER_LONGITUDE');

            $temp = file_get_contents($baseUrl . '/' . $api . '/' . $Oita['latitude'] . ',' . $Oita['longitude']);
            $forecast = json_decode($temp,true);

            $weather = new Weather();
            $weather->weather = $forecast['currently']['icon'];
            $weather->precipitation = $forecast['currently']['precipProbability'];
            $weather->temperature = round(($forecast['currently']['temperature'] - 30) / 2, 1);
            $weather->humidity = round($forecast['currently']['humidity'], 2) * 100;
            $weather->wind_speed = round($forecast['currently']['windSpeed'], 1);
            $weather->save();

        } catch (\Exception $e) {
            $weather = new Weather();
            $weather->weather = "天気を取得できませんでした";
            $weather->save();
        }

        return redirect('/index');
    }
}
