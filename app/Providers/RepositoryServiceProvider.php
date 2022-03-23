<?php

namespace App\Providers;

use App\Repositories\CityRepository;
use App\Repositories\Interfaces\CityRepositoryInterface;
use App\Repositories\Interfaces\LocationRepositoryInterface;
use App\Repositories\Interfaces\WeatherForecastRepositoryInterface;
use App\Repositories\LocationRepository;
use App\Repositories\WeatherForecastRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(CityRepositoryInterface::class, CityRepository::class);
        $this->app->bind(LocationRepositoryInterface::class, LocationRepository::class);
        $this->app->bind(WeatherForecastRepositoryInterface::class, WeatherForecastRepository::class);
    }
}
