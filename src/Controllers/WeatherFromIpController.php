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
    public function weatherRaw($ip) {
        $forecast = app()->make(Forecast::class);
        $weatherData = $forecast->index($ip);

        return $weatherData;
        //return $weatherData;
    }
    public function locationRaw($ip) {
        $forecast = app()->make(Forecast::class);
        $locationData = $forecast->index($ip,true);

        return $locationData;
        //return $weatherData;
    }
}