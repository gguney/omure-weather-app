<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\LocationRepositoryInterface;
use Illuminate\Http\JsonResponse;

class LocationController extends Controller
{
    /**
     * @param  LocationRepositoryInterface  $locationRepository
     * @return JsonResponse
     */
    public function index(LocationRepositoryInterface $locationRepository): JsonResponse
    {
        return response()->json(['locations' => $locationRepository->getAllLocations()]);
    }
}
