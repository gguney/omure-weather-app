<?php

namespace App\Providers;

use App\Services\OpenWeatherService;
use App\Services\WeatherServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(WeatherServiceInterface::class, OpenWeatherService::class);
    }
}
