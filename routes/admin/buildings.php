<?php

use App\Http\Controllers\Admin\BuildingController;
use Illuminate\Support\Facades\Route;

/**
 * GET
 */
Route::prefix('admin/buildings')->group(function () {
    Route::get('', [BuildingController::class, 'index'])->name('admin.buildings');
    Route::get('new-building', [BuildingController::class, 'newBuilding'])->name('admin.buildings.new-building');
    Route::get('edit-building/{building}', [BuildingController::class, 'editBuilding'])->name('admin.buildings.edit-building');
});

/**
 * POST
 */

Route::prefix('admin/buildings')->group(function () {
    Route::post('save-building', [BuildingController::class, 'saveBuilding'])->name('admin.buildings.save-building');
});

/**
 * PUT
 */

Route::prefix('admin/buildings')->group(function () {
    Route::put('update-building/{building}', [BuildingController::class, 'updateBuilding'])->name('admin.buildings.update-building');

    Route::put('update-building-gallery/{building}', [BuildingController::class, 'buildingGalleryImageUpdate'])
        ->name('admin.buildings.update-building-gallery');
});

/**
 * DELETE
 */

Route::prefix('admin/buildings')->group(function () {
    Route::delete('delete-building/{building}', [BuildingController::class, 'removeBuilding'])->name('admin.buildings.delete-building');
});
