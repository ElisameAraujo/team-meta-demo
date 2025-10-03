<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HousingComplexController extends Controller
{
    public function homeConfiguration()
    {
        return view('admin.home-configuration');
    }

    public function newSlide()
    {
        return view('admin.new-slide');
    }
}
