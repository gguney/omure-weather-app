<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface CityRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getAllCities(): Collection;
}
