<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'city_id' => City::inRandomOrder()->first('id')->id,
        ];
    }
}
