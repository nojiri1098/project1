<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class AnalyticsController extends Controller
{
    public function index()
    {
        return view('contents.analytics');
    }
}
