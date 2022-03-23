<?php

namespace App\Services;

use App\Repositories\Interfaces\LocationRepositoryInterface;
use App\Repositories\Interfaces\WeatherForecastRepositoryInterface;
use Illuminate\Support\Collection;

class WeatherForecastService
{
    private LocationRepositoryInterface $locationRepository;
    private WeatherServiceInterface $weatherService;
    private WeatherForecastRepositoryInterface $weatherForecastRepository;

    /**
     * LocationService Contructor
     * @param  LocationRepositoryInterface  $locationRepository
     * @param  WeatherServiceInterface  $weatherService
     * @param  WeatherForecastRepositoryInterface  $weatherForecastRepository
     */
    public function __construct(
        LocationRepositoryInterface $locationRepository,
        WeatherServiceInterface $weatherService,
        WeatherForecastRepositoryInterface $weatherForecastRepository,
    ) {
        $this->locationRepository = $locationRepository;
        $this->weatherService = $weatherService;
        $this->weatherForecastRepository = $weatherForecastRepository;
    }

    /**
     * @return Collection
     */
    public function createOrUpdateAllWeatherForecasts(): Collection
    {
        $locations = $this->locationRepository->getAllLocations();
        $newWeatherForecasts = collect([]);

        foreach ($locations as $location) {
            $weatherForecasts = $this->weatherService->getWeatherDataByLocation($location->toArray());

            foreach ($weatherForecasts as $weatherForecastData) {
                $newWeatherForecasts->push(
                    $this->weatherForecastRepository
                        ->createOrUpdateWeatherForecast($location->id, $weatherForecastData)
                );
            }
        }

        return $newWeatherForecasts;
    }

    /**
     * @param  string  $date
     * @return Collection
     */
    public function getWeatherForecastsForADate(string $date): Collection
    {
        $this->createOrUpdateAllWeatherForecasts();

        return $this->weatherForecastRepository->getWeatherForecastsForADate($date);
    }
}
