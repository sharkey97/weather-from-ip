<?php

namespace sharkey97\weatherfromip\services;

use Illuminate\Support\Facades\Http;

class IpService
{
    public function getLocation($ipAddress)
    {

        $response = Http::get("https://ipapi.co/{$ipAddress}/json/"); // do you need api keys?
        $backup = Http::get("http://ip-api.com/json/{$ipAddress}"); // do you need api keys?
        
        if ($response->ok()) {
            return $response->json();
        }elseif ($backup->ok()) {
            return $backup->json();
        }
        
        return null;
    }
}
