<?php

use App\Http\Controllers\Web\ApartmentControllerWeb;
use Illuminate\Support\Facades\Route;

$middleware = ['verified'];

Route::prefix('building/{building}/apartment/{unit}')->group(function () {

    Route::get('', [ApartmentControllerWeb::class, 'index'])->name('web.buildings.apartments.overview');
});
