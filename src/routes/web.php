<?php

use Sharkey97\WeatherFromIp\Controllers\WeatherFromIpController;
use Illuminate\Support\Facades\Route;

Route::get('forecast/{ip?}', [WeatherFromIpController::class,  '__invoke']);
Route::get('forecast/{ip?}/weather', [WeatherFromIpController::class,  'weatherRaw']);
Route::get('forecast/{ip?}/location', [WeatherFromIpController::class,  'locationRaw']);