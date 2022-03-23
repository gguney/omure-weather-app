<?php

namespace Tests\Unit;

use App\Events\CityAddedEvent;
use App\Listeners\CityAddedListener;
use App\Models\City;
use App\Models\Location;
use App\Repositories\Interfaces\LocationRepositoryInterface;
use App\Services\LocationService;
use App\Services\WeatherServiceInterface;
use Tests\BaseTest;

class CityAddedListenerTest extends BaseTest
{
    /** @test */
    public function it_should_dispatch_city_added_event_and_fetch_city_information()
    {
        $city = City::factory()->create(['name' => 'Ankara']);
        $location = Location::factory()->make(['city_id' => $city->id]);

        $weatherServiceInterface = $this->partialMock(
            WeatherServiceInterface::class,
            function ($mock) use ($location) {
                $mock->shouldReceive('getCityInformation')->andReturn($location->only('latitude', 'longitude'));
            }
        );
        $locationService = new LocationService(resolve(LocationRepositoryInterface::class), $weatherServiceInterface);

        $cityAddedListener = new CityAddedListener($locationService);
        $cityAddedListener->handle(new CityAddedEvent($city));

        $this->assertDatabaseHas('locations', $location->toArray());
    }
}
