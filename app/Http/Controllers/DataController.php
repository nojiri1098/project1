<?php

namespace App\Http\Controllers;

use App\Environment;
use App\Planter;
use App\Soil;
use Illuminate\Http\Request;

use App\Http\Requests;

class DataController extends Controller
{
    public function index()
    {
        $envs  = Environment::all();
        return view('contents.data')->with(['envs' => $envs]);
    }
}
