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

        return view('contents.index')->with(['envs' => $envs]);
    }

    public function pulse()
    {
        return view('contents.pulse');
    }
}
