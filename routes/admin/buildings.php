<?php

use App\Http\Controllers\Admin\BuildingController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/buildings')->group(function () {
    Route::get('', [BuildingController::class, 'index'])->name('admin.buildings');
    Route::get('new-building', [BuildingController::class, 'newBuilding'])->name('admin.buildings.new-building');
    Route::get('edit-building/{building}', [BuildingController::class, 'editBuilding'])->name('admin.buildings.edit-building');
});
