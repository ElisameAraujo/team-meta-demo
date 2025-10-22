<?php

namespace App\Repositories\Web;

use App\Interfaces\Web\BuildingInterfaceWeb;
use App\Models\Admin\Apartment;
use App\Models\Admin\ApartmentCoordinate;
use App\Models\Admin\Building;
use App\Models\Admin\BuildingGallery;
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

    public function coordinates(string $slug, $section)
    {
        $building = Building::where('building_slug', $slug)->firstOrFail();
        $sectionItem = Section::where('section_slug', $section)->firstOrFail();

        $coordinates = ApartmentCoordinate::with(['apartment.status'])
            ->whereHas('apartment', function ($query) use ($building, $sectionItem) {
                $query->where('building_id', $building->id)
                    ->where('section_id', $sectionItem->id);
            })
            ->get();

        return $coordinates;
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

        $floors = Apartment::floors($building->id);

        return $floors;
    }

    public function ambients($slug)
    {
        if (Building::where('building_slug', $slug)->exists()) {
            $building = Building::where('building_slug', $slug)->first();
        }

        $ambients = Apartment::ambients($building->id);

        return $ambients;
    }

    public function sectionImage($building_id, $section_id)
    {
        $image = BuildingGallery::where('building_id', $building_id)
            ->where('type', $section_id)
            ->first();

        return $image;
    }

    public function overviewImage($building_id)
    {
        $image = BuildingGallery::where('building_id', $building_id)
            ->where('type', 'west')
            ->first();

        $overviewSection = $image->building_image;
        return $overviewSection;
    }
}
