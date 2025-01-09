<?php

namespace App\Http\Controllers;

use App\Http\Requests\FindNearbyOrganizationRequest;
use App\Http\Requests\SearchByActivityRequest;
use App\Http\Requests\StoreOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use App\Models\Activity;
use App\Models\Organization;
use Illuminate\Http\JsonResponse;
use MatanYadaev\EloquentSpatial\Objects\Point;

class OrganizationController extends Controller
{

    public function findNearby(FindNearbyOrganizationRequest $request)
    {
//        return $organizations = Organization::where('building_id', 1)->get();
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $radius = $request->input('radius', 10); // Default radius in kilometers
        $point = new Point($latitude, $longitude, 4326);
        $organizations = Organization::query()->whereHas('building', function ($q) use ($point, $radius) {
            $q->whereDistanceSphere('coordinates', $point, '<=', $radius * 1000);
        })->get();
        return response()->json($organizations);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrganizationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Organization $organization)
    {
        return $organization->load('building');
    }

    /**
     * Поиск организаций по названию активности. Поиск рекурсивный. Возвращаются организации которые, находятся "в дочерних" у искомой активности
     */
    public function searchByActivity(SearchByActivityRequest $request): JsonResponse
    {
        $activityName = $request->input('activity');

        // Найдите вид деятельности по названию
        $activity = Activity::query()->where('name', $activityName)->first();
        if (!$activity) {
            return response()->json(['error' => 'Activity not found'], 404);
        }

        // Найдите все вложенные виды деятельности
        $activityIds = $this->getAllActivityIds($activity);

        // Найдите все организации, связанные с этими видами деятельности
        $organizations = Organization::query()->whereHas('activities', function ($query) use ($activityIds) {
            $query->whereIn('activities.id', $activityIds);
        })->get();
        return response()->json($organizations);
    }

    private function getAllActivityIds(Activity $activity): array
    {
        $ids = [$activity->id];
        foreach ($activity->children as $child) {
            $ids = array_merge($ids, $this->getAllActivityIds($child));
        }
        return $ids;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrganizationRequest $request, Organization $organization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization)
    {
        //
    }
}
