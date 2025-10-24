<?php

use App\Http\Controllers\Admin\TransitionsController;
use Illuminate\Support\Facades\Route;

$middleware = ['verified'];

Route::prefix('transitions')->group(function () {

    Route::post('save-transition', [TransitionsController::class, 'addTransition'])->name('admin.transitions.add-transition');
    Route::put('update-transition', [TransitionsController::class, 'updateTransition'])->name('admin.transitions.update-transition');
});
