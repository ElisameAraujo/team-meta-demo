<?php

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\SectionOverviewController;
use Illuminate\Support\Facades\Route;

/**
 * GET
 */
Route::prefix('complex/section')->group(function () {

    Route::get('{section}/overview', [SectionOverviewController::class, 'sectionOverview'])
        ->name('web.section-overview');
});
