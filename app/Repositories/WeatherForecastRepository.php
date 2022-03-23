<?php

namespace App\Repositories;

use App\Models\WeatherForecast;
use App\Repositories\Interfaces\WeatherForecastRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class WeatherForecastRepository implements WeatherForecastRepositoryInterface
{
    private WeatherForecast $weatherForecast;

    /**
     * WeatherForecastRepository Constructor
     * @param  WeatherForecast  $weatherForecast
     */
    public function __construct(WeatherForecast $weatherForecast)
    {
        $this->weatherForecast = $weatherForecast;
    }

    /**
     * @param  int  $locationId
     * @param  array  $weatherForecastData
     * @return WeatherForecast
     */
    public function createOrUpdateWeatherForecast(int $locationId, array $weatherForecastData): WeatherForecast
    {
        return $this->weatherForecast
            ->updateOrCreate(
                ['location_id' => $locationId, 'dt' => $weatherForecastData['dt']],
                ['location_id' => $locationId, 'dt' => $weatherForecastData['dt'], 'meta' => $weatherForecastData]
            );
    }

    /**
     * @param  string  $date
     * @return Collection
     */
    public function getWeatherForecastsForADate(string $date): Collection
    {
        return $this->weatherForecast->with('location.city')->where('forecast_date', Carbon::parse($date))->get();
    }
}
