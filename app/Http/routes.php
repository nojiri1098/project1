<?php

/* root */
Route::get('/', function () {
    return redirect('/dashboard');
});
//Route::get('/','DashboardController@index');

/* Dashboard */
Route::get('/dashboard','DashboardController@index');

/* Data */
Route::get('/data','DataController@index');

/* Analytics */
Route::get('/analytics','AnalyticsController@index');