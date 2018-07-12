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
        $envs = Environment::orderBy('created_at', 'DESC')->paginate(50);

        return view('contents.data')->with(['envs' => $envs, 'dates' => dateList()]);
    }

    public function search(Request $request)
    {
        if ($request->date == 0) {
            return redirect()->back();
        }

        $searched_envs = Environment::whereDate('created_at', "=", $request->date)->orderBy('created_at', 'DESC')->paginate(50);

        return view('contents.data')->with(['envs' => $searched_envs, 'dates' => dateList()]);
    }
}
