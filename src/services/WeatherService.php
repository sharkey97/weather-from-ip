<?php

namespace sharkey97\weatherfromip\services;

use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Config\Repository as Config;


class WeatherService
{
    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function getWeatherForecast($city)
    {
        $openWeatherKey = $this->config->get('apikeys.open_weather_key');
        $weatherStackKey = $this->config->get('apikeys.weather_stack_key');

        $response = Http::get("https://api.openweathermap.org/data/2.5/weather?id=524901&appid={$openWeatherKey}&q={$city}");
        
        
        if ($response->ok()) {
            return $response->json();
        }
        else {
            $backup = Http::get("http://api.weatherstack.com/current?access_key={$weatherStackKey}&query={$city}");
            return $backup->json();
        }
    }
}
