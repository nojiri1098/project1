<?php

/* root */
Route::get('/index', 'HomeController@index');
Route::get('/pulse', 'HomeController@pulse');

/* Dashboard */
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('/store', 'DashboardController@storeCensorValue')->name('store');
    Route::get('/weather', 'DashboardController@getWeather')->name('weather');
});

/* Data */
Route::group(['prefix' => 'data'], function () {
    Route::get('/', 'DataController@index')->name('data');
    Route::post('/', 'DataController@search');
});

/* Analytics */
Route::group(['prefix' => 'analytics'], function () {
    Route::get('/','AnalyticsController@index')->name('analytics');
});
