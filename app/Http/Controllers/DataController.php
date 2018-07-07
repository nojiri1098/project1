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
        // 時間があればPaginateを実装する
        $envs = Environment::limit(300)->orderBy('created_at', 'DESC');
        $temps = $envs->get(['created_at']);
        foreach ($temps as $key => $temp) {
            $dates[$key] = $temp->created_at->format('Y-m-d');
        }
        $result = array_unique($dates);

        return view('contents.data')->with(['envs' => $envs->get(), 'dates' => $result]);
    }

    public function search(Request $request)
    {
        if ($request->date == 0) {
            return redirect()->back();
        }

        // 時間があればPaginateを実装する
        $envs = Environment::limit(300)->orderBy('created_at', 'DESC');
        $temps = $envs->get(['created_at']);
        foreach ($temps as $key => $temp) {
            $dates[$key] = $temp->created_at->format('Y-m-d');
        }
        $result = array_unique($dates);

        $searched_envs = Environment::whereDate('created_at', "=", $request->date)->orderBy('created_at', 'DESC')->get();

        return view('contents.data')->with(['envs' => $searched_envs, 'dates' => $result]);
    }
}
