<?php

namespace App\Listeners;

use App\Events\CityAddedEvent;
use App\Services\LocationService;

class CityAddedListener
{
    private LocationService $locationService;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(LocationService $weatherService)
    {
        $this->locationService = $weatherService;
    }

    /**
     * Handle the event.
     *
     * @param  CityAddedEvent  $event
     * @return void
     */
    public function handle(CityAddedEvent $event)
    {
        $this->locationService->getCityLocationInformation($event->city);
    }
}
