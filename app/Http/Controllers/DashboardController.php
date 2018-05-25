<?php

namespace App\Http\Controllers;

use App\Environment;
use App\Planter;
use Illuminate\Http\Request;
use App\Http\Requests;

class DashboardController extends Controller
{
    public function index()
    {
        $env = Environment::first();
        $weather = Environment::$weatherTypeLabels[$env->weather];
        return view('contents.dashboard')->with(['env' => $env, 'weather' => $weather]);
    }
}
