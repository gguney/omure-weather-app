<?php

namespace Tests\Feature;

use App\Models\Location;
use App\Models\WeatherForecast;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use Tests\BaseTest;

class WeatherForecastTest extends BaseTest
{
    /** @test */
    public function it_should_return_weather_forecasts_for_the_inputted_date()
    {
        $locations = Location::with('city')->get();

        $today = Carbon::now()->addDay();
        $yesterday = Carbon::now()->subDay();

        $response = $this->json('POST', '/api/weather-forecasts', ['date' => $today->format('Y-m-d')]);

        $response->assertSuccessful();

        $response->assertSee(['forecast_date' => $today->format('Y-m-d')]);

        foreach ($locations as $location){
            $response->assertSee(['location_id' => $location->id, 'forecast_date' => $today->format('Y-m-d')]);
            $response->assertDontSee(['forecast_date' => $yesterday->format('Y-m-d')]);
        }
    }

    /** @test */
    public function it_should_return_an_error_when_inputted_date_is_more_than_weather_service_historic_date_limit()
    {
        $someDate = Carbon::now()->subDays(rand(10, 15));

        $response = $this->json('POST', '/api/weather-forecasts', ['date' => $someDate->format('Y-m-d')]);

        $response->assertStatus(Response::HTTP_BAD_REQUEST)
            ->assertJsonFragment([
                'message' => "Can not make a search for the date older than: " .
                    WeatherForecast::MAX_HISTORIC_DAY_COUNT . " days",
            ]);
    }

    /** @test */
    public function it_should_return_an_error_when_there_is_no_weather_forecasts_for_the_inputted_date()
    {
        $futureDate = Carbon::now()->addDays(rand(10, 20));

        $response = $this->json('POST', '/api/weather-forecasts', ['date' => $futureDate->format('Y-m-d')]);

        $response->assertStatus(Response::HTTP_BAD_REQUEST)
            ->assertJsonFragment(['message' => 'Can not find any forecast data for the inputted date.']);
    }

    /** @test */
    public function it_should_validate_date_field()
    {
        $invalidDateValues = [null, Str::random(), rand(0, 1000), []];

        foreach ($invalidDateValues as $invalidDateValue) {
            $response = $this->json('POST', '/api/weather-forecasts', ['date' => $invalidDateValue]);

            $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
                ->assertJsonValidationErrors('date');
        }
    }
}
