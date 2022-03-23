<?php

namespace App\Repositories;

use App\Models\City;
use App\Repositories\Interfaces\CityRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CityRepository implements CityRepositoryInterface
{
    private City $city;

    /**
     * CityRepository Constructor
     * @param  City  $city
     */
    public function __construct(City $city)
    {
        $this->city = $city;
    }

    /**
     * @return Collection
     */
    public function getAllCities(): Collection
    {
        return $this->city->with('locations')->get();
    }
}
