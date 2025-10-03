<?php

use App\Http\Controllers\Admin\HousingComplexController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('home-configuration', [HousingComplexController::class, 'homeConfiguration'])->name('admin.home-configuration');
    Route::get('home-configuration/new-slide', [HousingComplexController::class, 'newSlide'])->name('admin.home.new-slide');
});
