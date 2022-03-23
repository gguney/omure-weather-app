<?php

namespace App\Events;

use App\Models\City;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CityAddedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public City $city;

    /**
     * Create a new event instance.
     * @param  City  $city
     * @return void
     */
    public function __construct(City $city)
    {
        $this->city = $city;
    }
}
