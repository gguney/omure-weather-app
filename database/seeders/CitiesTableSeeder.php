<?php

namespace Database\Seeders;

use App\Events\CityAddedEvent;
use App\Models\City;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = ['New York', 'London', 'Paris', 'Berlin', 'Tokyo'];

        foreach ($cities as $city) {
            $city = City::factory()->create(['name' => $city]);

            CityAddedEvent::dispatch($city);
        }
    }
}
