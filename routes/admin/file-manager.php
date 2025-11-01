<?php

use App\Http\Controllers\Admin\FileManagerController;
use Illuminate\Support\Facades\Route;

$middleware = ['verified'];

Route::prefix('admin/file-manager')->group(function () {

    Route::get('', [FileManagerController::class, 'index'])->name('admin.file-manager');
});
