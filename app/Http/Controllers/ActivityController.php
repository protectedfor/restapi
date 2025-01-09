<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Activity;
use App\Models\Building;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function getOrganizations(Request $request, Activity $activity): mixed
    {
        return $activity->organizations;
    }
}
