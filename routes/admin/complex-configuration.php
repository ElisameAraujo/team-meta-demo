<?php

use App\Http\Controllers\Admin\ComplexController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/')->group(function () {
    Route::get('', [ComplexController::class, 'complexConfiguration'])->name('admin.complex-configuration');
});

/**
 * POST
 */
Route::prefix('admin/complex')->group(function () {
    Route::post('add-complex-image-overview', [ComplexController::class, 'addOverviewComplexImage'])
        ->name('admin.complex.add-complex-image-overview');
});


/**
 * PUT
 */
Route::prefix('admin/complex')->group(function () {
    Route::put('update-complex-image-overview', [ComplexController::class, 'updateOverviewComplexImage'])
        ->name('admin.complex.update-complex-image-overview');
});
