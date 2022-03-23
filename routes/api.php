<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\WeatherForecastController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/cities', [CityController::class, 'index']);
Route::get('/locations', [LocationController::class, 'index']);
Route::post('/weather-forecasts', [WeatherForecastController::class, 'index']);
