<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Interfaces\Web\ApartmentInterfaceWeb;
use App\Models\Admin\{Building, Section};
use Illuminate\Http\Request;

class ApartmentControllerWeb extends Controller
{
    public function __construct(private ApartmentInterfaceWeb $apartment) {}
    public function index($buildingSlug, $unit)
    {
        $buildings = Building::select(['building_name', 'building_slug'])->get();
        $apartment = $this->apartment->overview($unit);
        $building = $this->apartment->buildingOrigin($buildingSlug);
        $sections = Section::all();

        return view('web.apartments.index', compact('apartment', 'buildings', 'building', 'sections'));
    }
}
