<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Interfaces\Web\BuildingInterfaceWeb;
use App\Models\Admin\{Apartment, ApartmentStatus, Building, BuildingGallery, Section};
use Illuminate\Http\Request;

class BuildingControllerWeb extends Controller
{
    public function __construct(private BuildingInterfaceWeb $building) {}

    public function buildingOverview($slug)
    {
        $building = $this->building->buildingOverview($slug);
        $apartments = $this->building->apartments($slug);
        $buildings = Building::select(['building_name', 'building_slug'])->get();
        $sections = Section::all();
        $status = ApartmentStatus::all();
        $floors = $this->building->floors($slug);
        $ambients = $this->building->ambients($slug);
        $overviewBackground = $this->building->overviewImage($building->id);

        return view('web.overview.building', compact('building', 'apartments', 'buildings', 'sections', 'floors', 'ambients', 'status', 'overviewBackground'));
    }

    public function buildingSection($slug, $section)
    {
        $building = $this->building->buildingOverview($slug);
        $buildings = Building::select(['building_name', 'building_slug'])->get();
        $sections = Section::all();
        $currentSection = Section::where('section_slug', $section)->firstOrFail();
        $floors = $this->building->floors($slug);
        $ambients = $this->building->ambients($slug);
        $status = ApartmentStatus::all();
        $apartments = $this->building->apartmentsPerSection($slug, $section);
        $sectionImage = $this->building->sectionImage($building->id, $section);

        return view('web.building-sections.section', compact(
            'building',
            'buildings',
            'sections',
            'floors',
            'ambients',
            'status',
            'apartments',
            'currentSection',
            'sectionImage'
        ));
    }
}
