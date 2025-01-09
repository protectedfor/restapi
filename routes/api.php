<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\OrganizationController;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::middleware('check-api-key')->group(function () {
    Route::get('buildings/{building}/organizations', [BuildingController::class, 'getOrganizations']); //по хорошему использовать контроллер BuildingsOrganizationsController
    Route::get('activities/{activity}/organizations', [ActivityController::class, 'getOrganizations']); //по хорошему использовать контроллер ActivitiesOrganizationsController
    Route::get('organizations/nearby', [OrganizationController::class, 'findNearby']);
    Route::get('buildings', [BuildingController::class, 'index']);
    Route::get('organizations/{organization}', [OrganizationController::class, 'show']);
    Route::get('organizations/search', [OrganizationController::class, 'searchByActivity']);
});
