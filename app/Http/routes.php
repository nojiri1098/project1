<?php

/* index */
Route::get('/index', 'HomeController@index');
Route::get('/index/weather', 'HomeController@getWeather');
/* pulse */
Route::get('/pulse', 'HomeController@showPulse');
Route::post('/pulse', 'HomeController@updatePulse');
/* data */
Route::get('/data', 'DataController@index')->name('data');
Route::post('/data', 'DataController@search');