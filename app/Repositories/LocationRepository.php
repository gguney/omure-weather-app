<?php

namespace App\Repositories;

use App\Models\Location;
use App\Repositories\Interfaces\LocationRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class LocationRepository implements LocationRepositoryInterface
{
    private Location $location;

    /**
     * LocationRepository Constructor
     * @param  Location  $location
     */
    public function __construct(Location $location)
    {
        $this->location = $location;
    }

    /**
     * @return Collection
     */
    public function getAllLocations(): Collection
    {
        return $this->location->with('city')->get();
    }

    /**
     * @param  array  $locationData
     * @return Location
     */
    public function createLocation(array $locationData): Location
    {
        return $this->location->create($locationData);
    }
}
