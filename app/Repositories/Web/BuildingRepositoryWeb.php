<?php

namespace App\Repositories\Web;

use App\Interfaces\Web\BuildingInterfaceWeb;
use App\Models\Admin\Apartment;
use App\Models\Admin\Building;
use App\Models\Admin\Section;

class BuildingRepositoryWeb implements BuildingInterfaceWeb
{

    public function buildingOverview($slug)
    {
        if (Building::where('building_slug', $slug)->exists()) {
            $building = Building::where('building_slug', $slug)->first();
            return $building;
        }
    }

    public function apartments($slug)
    {
        if (Building::where('building_slug', $slug)->exists()) {
            $building = Building::where('building_slug', $slug)->first();
        }
        $apartments = Apartment::where('building_id', $building->id)->get();

        return $apartments;
    }

    public function apartmentsPerSection($slug, $section)
    {
        if (Building::where('building_slug', $slug)->exists()) {
            $building = Building::where('building_slug', $slug)->first();
        }

        if (Section::where('section_slug', $section)->exists()) {
            $section = Section::where('section_slug', $section)->first();
        }

        $apartments = Apartment::where('building_id', $building->id)
            ->where('section_id', $section->id)
            ->get();

        return $apartments;
    }

    public function floors($slug)
    {
        if (Building::where('building_slug', $slug)->exists()) {
            $building = Building::where('building_slug', $slug)->first();
        }

        $floors = Apartment::where('building_id', $building->id)
            ->select('floor')
            ->distinct()
            ->orderBy('floor')
            ->pluck('floor');

        return $floors;
    }

    public function ambients($slug)
    {
        if (Building::where('building_slug', $slug)->exists()) {
            $building = Building::where('building_slug', $slug)->first();
        }

        $ambients = Apartment::where('building_id', $building->id)
            ->select('ambients')
            ->distinct()
            ->orderBy('ambients')
            ->pluck('ambients');

        return $ambients;
    }
}
