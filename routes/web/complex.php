<?php

use App\Http\Controllers\Web\ComplexControllerWeb;
use Illuminate\Support\Facades\Route;

/**
 * GET
 */
Route::get('', [ComplexControllerWeb::class, 'index'])->name('web.index');
Route::prefix('complex/section')->group(function () {

    Route::get('{section}/overview', [ComplexControllerWeb::class, 'sectionComplexOverview'])
        ->name('web.section-overview');
});
