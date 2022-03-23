<?php

namespace App\Services;

interface WeatherServiceInterface
{
    /**
     * @param  string  $cityName
     * @return array
     */
    public function getCityInformation(string $cityName): array;

    /**
     * @param  array  $locationData
     * @return array
     */
    public function getWeatherDataByLocation(array $locationData): array;
}
