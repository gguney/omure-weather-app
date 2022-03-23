<?php

namespace App\Repositories\Interfaces;

use App\Models\Location;
use Illuminate\Database\Eloquent\Collection;

interface LocationRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getAllLocations(): Collection;

    /**
     * @param  array  $locationData
     * @return Location
     */
    public function createLocation(array $locationData): Location;
}
