<?php

use App\Http\Controllers\Web\ComplexControllerWeb;
use App\Http\Controllers\Web\BuildingControllerWeb;
use Illuminate\Support\Facades\Route;

/**
 * GET
 */
Route::prefix('/')->group(function () {

    Route::get('building/{building}/overview', [BuildingControllerWeb::class, 'buildingOverview'])
        ->name('web.building-overview');

    Route::get('building/{building}/section/{section}', [BuildingControllerWeb::class, 'buildingSection'])
        ->name('web.building.section');
});
