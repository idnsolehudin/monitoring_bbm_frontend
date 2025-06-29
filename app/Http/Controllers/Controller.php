<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

abstract class Controller
{
    
    protected static $url = "https://monitoringbbm.com/";
    
    protected static function httpClient() {
        $token = Session::get('access_token');
        return Http::withToken($token)->acceptJson();
    }
}
