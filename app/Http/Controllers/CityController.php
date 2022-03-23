<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\CityRepositoryInterface;
use Illuminate\Http\JsonResponse;

class CityController extends Controller
{
    /**
     * @param  CityRepositoryInterface  $cityRepository
     * @return JsonResponse
     */
    public function index(CityRepositoryInterface $cityRepository): JsonResponse
    {
        return response()->json(['cities' => $cityRepository->getAllCities()]);
    }
}
