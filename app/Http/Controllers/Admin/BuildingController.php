<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\BuildingInterface;
use App\Models\Admin\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{

    public function __construct(private BuildingInterface $building) {}

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

    /**
     * Management
     */

    public function saveBuilding(Request $request)
    {
        $data = $request->except('_token', 'background');
        $image = $request->background;

        $this->building->saveBuilding($data, $image);

        return redirect()->route('admin.buildings')->with('success', 'Building added successfully.');
    }

    public function updateBuilding(Building $building, Request $request)
    {
        $data = $request->except('_token');
        $this->building->updateBuilding($building, $data);

        return redirect()->back()->with('success', 'Building updated successfully.');
    }

    public function updateBuildingImage(Building $building, Request $request)
    {
        if ($request->hasFile('background')) {
            $this->building->updateBuildingImage($building, $request->background);
        } else {
            return redirect()->back()->with('error', 'No image file selected');
        }

        return redirect()->back()->with('update', 'Building image updated successfully.');
    }

    public function removeBuilding(Building $building)
    {
        $this->building->deleteBuilding($building);

        return redirect()->back()->with('delete', 'Building and Apartments delete successfully.');
    }
}
