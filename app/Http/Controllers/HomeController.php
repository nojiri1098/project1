<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Environment;

use App\Http\Requests;

class HomeController extends Controller
{
    public function index()
    {
        $envs = Environment::all();
        $temperatures = [];
        $humidities = [];

        foreach ($envs as $key => $env) {
            $temperatures[$key] = $env->temperature;
            $humidities[$key] = $env->humidity;
        }

        return view('contents.index')->with(['envs' => $envs, 'temperatures' => $temperatures, 'humidities' => $humidities]);
    }

    public function pulse()
    {
        return view('contents.pulse');
    }
}
