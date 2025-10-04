<?php

use App\Http\Controllers\Admin\ApartmentController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/buildings/{building}/apartments')->group(function () {
    Route::get('', [ApartmentController::class, 'index'])->name('admin.buildings.apartments');
    Route::get('new-apartment', [ApartmentController::class, 'newApartment'])->name('admin.buildings.apartments.new-apartment');
    Route::get('edit-apartment/{apartment}', [ApartmentController::class, 'editApartment'])->name('admin.buildings.apartments.edit-apartment');
});
