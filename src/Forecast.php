<?php

namespace Sharkey97\WeatherFromIp;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Sharkey97\WeatherFromIp\services\WeatherService;
use Sharkey97\WeatherFromIp\services\IpService;
use Illuminate\Support\Facades\Cache;

class Forecast
{
    protected $weatherService;
    protected $ipService;

    public function __construct(WeatherService $weatherService, IpService $ipService)
    {
        $this->weatherService = $weatherService;
        $this->ipService = $ipService;
    }

    public function index($ip,$locationRaw=false)
    {
        // Get the guest IP address from the request

        $locationData = $this->ipService->getLocation($ip);

        $city = $locationData['city'];
        $weatherData = $this->weatherService->getWeatherForecast($city);

        // Return the weather data

        if($locationRaw == true){
            return $locationData;
        }
        return $weatherData;
    }
}
