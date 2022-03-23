<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeatherForecastIndexRequest;
use App\Models\WeatherForecast;
use App\Services\WeatherForecastService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class WeatherForecastController extends Controller
{
    /**
     * @param  WeatherForecastService  $weatherForecastService
     * @param  WeatherForecastIndexRequest  $request
     * @return JsonResponse
     */
    public function index(
        WeatherForecastService $weatherForecastService,
        WeatherForecastIndexRequest $request
    ): JsonResponse {
        $requestData = $request->validated();
        $dayDiff = Carbon::now()->diffInDays(Carbon::parse($requestData['date']), false);

        if ($dayDiff < -WeatherForecast::MAX_HISTORIC_DAY_COUNT) {
            return response()->json(
                [
                    'message' => "Can not make a search for the date older than: " .
                        WeatherForecast::MAX_HISTORIC_DAY_COUNT . " days",
                ],
                400
            );
        }

        $weatherForecasts = $weatherForecastService->getWeatherForecastsForADate($requestData['date']);

        if (count($weatherForecasts) === 0) {
            return response()->json(['message' => 'Can not find any forecast data for the inputted date.'], 400);
        }

        return response()->json(['weatherForecasts' => $weatherForecasts]);
    }
}
