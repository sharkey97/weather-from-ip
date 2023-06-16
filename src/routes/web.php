<?php

use Sharkey97\WeatherFromIp\Controllers\WeatherFromIpController;
use Illuminate\Support\Facades\Route;

Route::get('forecast/{ip?}', [WeatherFromIpController::class,  '__invoke']);