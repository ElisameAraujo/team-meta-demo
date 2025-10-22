<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Interfaces\Web\BuildingInterfaceWeb;
use App\Models\Admin\{ApartmentStatus, Building, Section, TransitionsGallery};
use Illuminate\Http\Request;

class BuildingControllerWeb extends Controller
{
    public function __construct(private BuildingInterfaceWeb $building) {}

    public function buildingOverview($slug)
    {
        $building = $this->building->buildingOverview($slug);
        $apartments = $this->building->apartments($slug);
        $buildings = Building::buildingsList();
        $sections = Section::all();
        $status = ApartmentStatus::all();
        $floors = $this->building->floors($slug);
        $ambients = $this->building->ambients($slug);
        $overviewBackground = $this->building->overviewImage($building->id);

        $currentSide = $slug . ':west';

        $fromKey = $_COOKIE['fromKey'] ?? null;
        $toKey = $currentSide;
        $type = explode(':', $fromKey)[0] ?? null;

        $transition = null;
        if ($fromKey && $fromKey !== $toKey) {
            $transition = TransitionsGallery::where('from_key', $fromKey)
                ->where('to_key', $toKey)
                ->where('type', $type)
                ->first();
        }

        return view('web.overview.building', compact(
            'building',
            'apartments',
            'buildings',
            'sections',
            'floors',
            'ambients',
            'status',
            'overviewBackground',
            'currentSide',
            'transition',
        ));
    }

    public function buildingSection($slug, $section)
    {
        $building = $this->building->buildingOverview($slug);
        $buildings = Building::buildingsList();
        $sections = Section::all();
        $currentSection = Section::where('section_slug', $section)->firstOrFail();
        $floors = $this->building->floors($slug);
        $ambients = $this->building->ambients($slug);
        $status = ApartmentStatus::all();
        $apartments = $this->building->apartmentsPerSection($slug, $section);
        $sectionImage = $this->building->sectionImage($building->id, $section);

        $fromKey = $_COOKIE['fromKey'] ?? null;
        $toKey = $slug . ':' . $section; // destino atual
        $type = explode(':', $fromKey)[0] ?? null;

        $transition = null;
        if ($fromKey && $fromKey !== $toKey) {
            $transition = TransitionsGallery::where('from_key', $fromKey)
                ->where('to_key', $toKey)
                ->where('type', $type)
                ->first();
        }

        $currentSide = $slug . ':' . $section;
        $apartmentsCoordinates = $this->building->coordinates($slug, $section);

        return view('web.building-sections.section', compact(
            'building',
            'buildings',
            'sections',
            'floors',
            'ambients',
            'status',
            'apartments',
            'currentSection',
            'sectionImage',
            'currentSide',
            'transition',
            'apartmentsCoordinates'
        ));
    }
}
