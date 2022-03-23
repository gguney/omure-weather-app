<?php

namespace App\Repositories\Interfaces;

use App\Models\WeatherForecast;
use Illuminate\Database\Eloquent\Collection;

interface WeatherForecastRepositoryInterface
{
    /**
     * @param  int  $locationId
     * @param  array  $weatherForecastData
     * @return WeatherForecast
     */
    public function createOrUpdateWeatherForecast(int $locationId, array $weatherForecastData): WeatherForecast;

    /**
     * @param  string  $date
     * @return Collection
     */
    public function getWeatherForecastsForADate(string $date): Collection;
}
