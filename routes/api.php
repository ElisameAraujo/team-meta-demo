<?php

use App\Http\Controllers\Web\ComplexControllerWeb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/api/complex-data', [ComplexControllerWeb::class, 'complexAPI']);
