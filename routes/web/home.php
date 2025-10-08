<?php

use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Route;

/**
 * GET
 */
Route::prefix('/')->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('web.index');

    Route::get('complex/section/{section}/overview', [HomeController::class, 'sectionOverview'])
        ->name('web.section-overview');

    Route::get('building/{building}/overview', [HomeController::class, 'buildingOverview'])
        ->name('web.building-overview');

    Route::get('building/{building}/section/{section}', [HomeController::class, 'buildingSection'])
        ->name('web.building.section');
});
