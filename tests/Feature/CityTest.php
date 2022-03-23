<?php

namespace Tests\Feature;

use App\Models\City;
use Tests\BaseTest;

class CityTest extends BaseTest
{
    /** @test */
    public function it_should_return_all_cities()
    {
        $cities = City::factory()->count(rand(5, 10));

        $response = $this->get('/api/cities');

        $response->assertOk();

        foreach ($cities as $city){
            $response->assertSee($city->toArray());
        }
    }
}
