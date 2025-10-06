<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\ApartmentInterface;
use App\Models\Admin\Apartment;
use App\Models\Admin\ApartmentStatus;
use App\Models\Admin\Building;
use App\Models\Admin\Section;
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

    public function deleteApartment(Apartment $apartment)
    {
        $this->apartment->deleteApartment($apartment);

        return redirect()->back()->with('delete', 'Apartment e coordinates delete successfully');
    }
}
