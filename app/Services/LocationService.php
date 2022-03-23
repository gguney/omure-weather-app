<?php

namespace App\Services;

use App\Models\City;
use App\Models\Location;
use App\Repositories\Interfaces\LocationRepositoryInterface;

class LocationService
{
    private LocationRepositoryInterface $locationRepository;
    private WeatherServiceInterface $weatherService;

    /**
     * LocationService Contructor
     * @param  LocationRepositoryInterface  $locationRepository
     * @param  WeatherServiceInterface  $weatherService
     */
    public function __construct(
        LocationRepositoryInterface $locationRepository,
        WeatherServiceInterface $weatherService
    ) {
        $this->locationRepository = $locationRepository;
        $this->weatherService = $weatherService;
    }

    /**
     * @param  City  $city
     * @return Location
     */
    public function getCityLocationInformation(City $city): Location
    {
        $locationData = $this->weatherService->getCityInformation($city->name);
        $locationData['city_id'] = $city->id;

        return $this->locationRepository->createLocation($locationData);
    }
}
