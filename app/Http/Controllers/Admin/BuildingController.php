<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Admin\BuildingInterface;
use App\Models\Admin\Building;
use App\Models\Admin\BuildingGallery;
use App\Models\Admin\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $sections = Section::all();
        $gallery = BuildingGallery::where('building_id', $building->id)->get();

        // Mapeia cada seção com sua imagem correspondente
        $sectionGallery = $sections->map(function ($section) use ($gallery) {
            $image = $gallery->firstWhere('section_id', $section->id);
            return [
                'section' => $section,
                'image' => $image,
            ];
        });

        return view('admin.buildings.edit-building', [
            'building' => $building,
            'sectionGallery' => $sectionGallery,
        ]);
    }



    /**
     * Management
     */

    public function saveBuilding(Request $request)
    {
        $data = $request->except('_token', 'background');
        $this->building->saveBuilding($data);

        return redirect()->route('admin.buildings')->with('success', 'Building added successfully.');
    }

    public function updateBuilding(Building $building, Request $request)
    {
        $data = $request->except('_token');
        $this->building->updateBuilding($building, $data);

        return redirect()->back()->with('success', 'Building updated successfully.');
    }

    public function buildingGalleryImageUpdate(Building $building, Request $request)
    {
        $data = (object) $request->except('_token');

        if ($request->hasFile('building_section')) {
            $this->building->updateSectionImage($building, $data);
        } else {
            return redirect()->back()->with('error', 'No image file selected');
        }

        return redirect()->back()->with('update', 'Building image of ' . Str::ucfirst($request->type) . ' updated successfully.');
    }

    public function removeBuilding(Building $building)
    {
        $this->building->deleteBuilding($building);

        return redirect()->back()->with('delete', 'Building and Apartments delete successfully.');
    }
}
