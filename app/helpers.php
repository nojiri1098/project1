<?php

use App\Environment;

function isActiveUrl($url, $string = 'active')
{
    return \Illuminate\Support\Facades\Request::is($url) ? $string : '';
}

function dateList()
{
    $temps = Environment::orderBy('created_at', 'DESC');

    foreach ($temps->get(['created_at']) as $key => $temp) {
        $dates[$key] = $temp->created_at->format('Y-m-d');
    }

    return array_unique($dates);
}