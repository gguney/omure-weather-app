<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenWeatherService implements WeatherServiceInterface
{
    private const BASE_URL = "https://api.openweathermap.org";

    /**
     * @param  string  $cityName
     * @return array
     */
    public function getCityInformation(string $cityName): array
    {
        $result = $this->sendRequest("/geo/1.0/direct?q=$cityName&limit=1");

        return [
            'latitude' => $result[0]['lat'],
            'longitude' => $result[0]['lon'],
        ];
    }

    /**
     * @param  array  $locationData
     * @return array
     */
    public function getWeatherDataByLocation(array $locationData): array
    {
        $result = $this->sendRequest(
            "/data/2.5/onecall?lat=" . $locationData['latitude'] .
            "&lon=" . $locationData['longitude'] .
            '&exclude:minutely,alert,hourly,current'
        );

        return $result['daily'];
    }

    /**
     * @param  string  $uri
     * @return mixed|void
     */
    private function sendRequest(string $uri)
    {
        $response = Http::get(self::BASE_URL . $uri . '&appid=' . config('weather.open_weather_api_key'));

        if ($response->successful()) {
            return json_decode($response->body(), true);
        } else {
            dd($response->body());
        }
    }
}
