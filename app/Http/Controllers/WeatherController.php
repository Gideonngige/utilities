<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
    //
    public function getWeather1(){
        $city = "Nairobi";
        $API_KEY = "1e2b1c4a18787d3b51e6b5070e19d4de";
        $client = new Client();
        $response = $client->get("https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$API_KEY}",['verify'=>false]);
        $body = $response->getBody();
        $data = json_decode($body);
        $weather = $data->weather[0]->main;
        $temp = $data->main->temp;
        $temp = $temp - 273.15;
        $icon = $data->weather[0]->icon;
        // $icon = "https://openweathermap.org/img/w/{$icon}.png";
        $description = $data->weather[0]->description;
        $wind_speed = $data->wind->speed;
        $humidity = $data->main->humidity;
        $pressure = $data->main->pressure;
        $name = $data->name;
        $timezone = 'Africa/Nairobi'; // Change this to your timezone
        $sunrise = \Carbon\Carbon::createFromTimestamp($data->sys->sunrise, 'UTC')->setTimezone($timezone)->format('h:i A');
        $sunset = \Carbon\Carbon::createFromTimestamp($data->sys->sunset, 'UTC')->setTimezone($timezone)->format('h:i A');

        return view('weather.weather',['temp'=>$temp,'icon'=>$icon,'description'=>$description, 'wind_speed'=>$wind_speed, 'humidity'=>$humidity, 'pressure'=>$pressure, 'name'=>$name, 'sunrise'=>$sunrise, 'sunset'=>$sunset]);
        
    }
    public function getWeather(Request $request){
        $city = $request->input('city');
        if($city == ''){
            $city = 'Nairobi';
        }
        else{
        $API_KEY = "1e2b1c4a18787d3b51e6b5070e19d4de";
        $client = new Client();
        try{
        $response = $client->get("https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$API_KEY}",['verify'=>false]);
        $body = $response->getBody();
        $data = json_decode($body);
        $weather = $data->weather[0]->main;
        $temp = $data->main->temp;
        $temp = $temp - 273.15;
        $icon = $data->weather[0]->icon;
        // $icon = "https://openweathermap.org/img/w/{$icon}.png";
        $description = $data->weather[0]->description;
        $wind_speed = $data->wind->speed;
        $humidity = $data->main->humidity;
        $pressure = $data->main->pressure;
        $name = $data->name;
        $timezone = 'Africa/Nairobi'; // Change this to your timezone
        $sunrise = \Carbon\Carbon::createFromTimestamp($data->sys->sunrise, 'UTC')->setTimezone($timezone)->format('h:i A');
        $sunset = \Carbon\Carbon::createFromTimestamp($data->sys->sunset, 'UTC')->setTimezone($timezone)->format('h:i A');

        return view('weather.weather',['temp'=>$temp,'icon'=>$icon,'description'=>$description, 'wind_speed'=>$wind_speed, 'humidity'=>$humidity, 'pressure'=>$pressure, 'name'=>$name, 'sunrise'=>$sunrise, 'sunset'=>$sunset]);
        // return $data;
        }
        catch(\Exception $e){
            return view('weather.weather',['error'=>'City not found. Please try again.']);
        }
        }

    }
}
