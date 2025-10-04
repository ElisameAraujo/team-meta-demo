<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Apartment;
use App\Models\Admin\ApartmentStatus;
use App\Models\Admin\Building;
use App\Models\Admin\Section;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
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
}
