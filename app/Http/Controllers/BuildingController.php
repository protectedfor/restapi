<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBuildingRequest;
use App\Http\Requests\UpdateBuildingRequest;
use App\Models\Building;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class BuildingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     */
    public function getOrganizations(Request $request, Building $building): mixed
    {
        return $building->organizations;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Collection
    {
        return Building::query()->get();
    }
}
