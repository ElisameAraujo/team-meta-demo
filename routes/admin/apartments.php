<?php

use App\Http\Controllers\Admin\ApartmentController;
use Illuminate\Support\Facades\Route;

/**
 * GET
 */
Route::prefix('admin/buildings/{building}/apartments')->group(function () {
    Route::get('', [ApartmentController::class, 'index'])->name('admin.buildings.apartments');
    Route::get('new-apartment', [ApartmentController::class, 'newApartment'])->name('admin.buildings.apartments.new-apartment');
    Route::get('edit-apartment/{apartment}', [ApartmentController::class, 'editApartment'])->name('admin.buildings.apartments.edit-apartment');
    Route::get('edit-coordinates/{apartment}', [ApartmentController::class, 'editCoordinates'])->name('admin.buildings.apartments.edit-coordinates');
});

/**
 * POST
 */
Route::prefix('admin/buildings/{building}/apartments')->group(function () {
    Route::post('save-apartment', [ApartmentController::class, 'saveApartment'])->name('admin.buildings.apartments.save-apartment');
});

/**
 * PUT
 */
Route::prefix('admin/buildings/apartments')->group(function () {
    Route::put('update-apartment/{apartment}', [ApartmentController::class, 'updateApartment'])->name('admin.buildings.apartments.update-apartment');
    Route::put('update-coordinates', [ApartmentController::class, 'updateCoordinates'])->name('admin.buildings.apartments.update-coordinates');
    Route::put('update-floor-plan-image', [ApartmentController::class, 'floorPlanImage'])->name('admin.buildings.apartments.update-floor-plan-image');
});


/**
 * DELETE
 */
Route::prefix('admin/buildings/apartments')->group(function () {
    Route::delete('delete-apartment/{apartment}', [ApartmentController::class, 'deleteApartment'])->name('admin.buildings.apartments.delete-apartment');
});
