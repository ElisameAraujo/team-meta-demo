<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Admin\ApartmentInterface;
use App\Models\Admin\{
    Apartment,
    ApartmentCoordinate,
    ApartmentStatus,
    Building,
    BuildingGallery,
    Section
};
use Illuminate\Http\Request;

class ApartmentController extends Controller
{

    public function __construct(private ApartmentInterface $apartment) {}
    public function index(Building $building)
    {
        $apartments = Apartment::with('section')
            ->where('building_id', $building->id)
            ->paginate(10);

        return view('admin.apartments.index', compact(
            'apartments',
            'building',
        ));
    }

    public function newApartment(Building $building)
    {
        $sections = Section::all();
        $apartmentStatus = ApartmentStatus::all();

        return view('admin.apartments.new-apartment', compact(
            'building',
            'sections',
            'apartmentStatus'
        ));
    }

    public function editApartment(Building $building, Apartment $apartment)
    {
        $sections = Section::all();
        $apartmentStatus = ApartmentStatus::all();

        return view('admin.apartments.edit-apartment', compact(
            'building',
            'apartment',
            'sections',
            'apartmentStatus'
        ));
    }

    public function saveApartment(Building $building, Request $request)
    {
        $data = $request->except('_token');
        $this->apartment->saveApartment($building, $data);

        return redirect()->route('admin.buildings.apartments', ['building' => $building->id])->with('success', 'Apartment added successfully');
    }

    public function updateApartment(Apartment $apartment, Request $request)
    {
        $data = $request->except('_token');
        $this->apartment->updateApartment($apartment, $data);

        return redirect()->back()->with('update', 'Apartment updated successfully');
    }

    public function editCoordinates(Building $building, Apartment $apartment)
    {
        $apartmentsCoordinates = ApartmentCoordinate::with('apartment')
            ->whereHas('apartment', function ($query) use ($apartment) {
                $query->where('section_id', $apartment->section_id)
                    ->where('building_id', $apartment->building_id);
            })
            ->get();

        $buildingBackground = $this->apartment->buildingBackground($building->id, $apartment->section_id);

        return view('admin.apartments.edit-coordinates', compact('building', 'apartment', 'apartmentsCoordinates', 'buildingBackground'));
    }

    public function updateCoordinates(Request $request)
    {
        $data = $request->except('_token', '_method');
        $this->apartment->updateCoordinates($data);

        return redirect()->back()->with('update', 'Apartment coordinates updated successfully');
    }

    public function floorPlanImage(Request $request)
    {
        if (!$request->hasFile('floor_plan_image')) {
            return redirect()->back()->with('error', 'No image file selected');
        }
        $data = (object) $request->except('_token', '_method');

        $this->apartment->floorPlanImage($data);

        return redirect()->back()->with('update', 'Apartment floor plan updated successfully');
    }

    public function deleteApartment(Apartment $apartment)
    {
        $this->apartment->deleteApartment($apartment);

        return redirect()->back()->with('delete', 'Apartment e coordinates deleted successfully');
    }
}
