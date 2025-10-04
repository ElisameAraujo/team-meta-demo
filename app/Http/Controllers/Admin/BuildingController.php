<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index()
    {
        $buildings = Building::all();
        return view('admin.buildings.index', compact('buildings'));
    }

    public function newBuilding()
    {
        return view('admin.buildings.new-building');
    }

    public function editBuilding(Building $building)
    {
        return view('admin.buildings.edit-building', compact('building'));
    }
}
