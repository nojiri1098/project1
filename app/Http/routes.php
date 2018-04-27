<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/* root */
Route::get('/','DashboardController@index');

/* Dashboard */
Route::get('/dashboard','DashboardController@index');

/* Data */
Route::get('/data','DataController@index');

/* Analytics */
Route::get('/analytics','AnalyticsController@index');