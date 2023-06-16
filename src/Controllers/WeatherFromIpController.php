<?php

namespace sharkey97\weatherfromip\Controllers;

use Illuminate\Http\Request;
use Sharkey97\WeatherFromIp\Forecast;

class WeatherFromIpController
{
    public function __invoke($ip) {
        $forecast = app()->make(Forecast::class);
        $weatherData = $forecast->index($ip);

        return view('forecast::index',compact('weatherData'));
        //return $weatherData;
    }
}