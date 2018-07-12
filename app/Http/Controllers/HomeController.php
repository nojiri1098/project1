<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Environment;
use App\Weather;

use App\Http\Requests;

class HomeController extends Controller
{
    public function index()
    {
        exec('python lib/test.py', $output);
        dd($output);

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

    public function pulse()
    {
        return view('contents.pulse');
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
            $weather->weather = $forecast['currently']['precipType'];
            $weather->precipitation = $forecast['currently']['precipProbability'];
            $weather->temperature = round(($forecast['currently']['temperature'] - 30) / 2, 2);
            $weather->humidity = round($forecast['currently']['humidity'], 2);
            $weather->windSpeed = $forecast['currently']['windSpeed'];
            $weather->save();

        } catch (\Exception $e) {
            $weather = new Weather();
            $weather->weather = "unknown";
            $weather->precipitation = 0;
            $weather->temperature = 0;
            $weather->humidity = 0;
            $weather->windSpeed = 0;
            $weather->save();
        }

        return redirect('/index');

    }
}
