<?php

use App\Http\Controllers\Admin\TransitionsController;
use Illuminate\Support\Facades\Route;

$middleware = ['verified'];

Route::prefix('transitions')->group(function () {

    Route::post('', [TransitionsController::class, 'addTransition'])->name('admin.transitions.add-transition');
});
