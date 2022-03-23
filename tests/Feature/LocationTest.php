<?php

namespace Tests\Feature;

use App\Models\Location;
use Tests\BaseTest;

class LocationTest extends BaseTest
{
    /** @test */
    public function it_should_return_all_locations()
    {
        $locations = Location::factory()->count(rand(5, 10));

        $response = $this->get('/api/locations');

        $response->assertOk();

        foreach ($locations as $location){
            $response->assertSee($location->toArray());
        }
    }
}
