<?php

namespace App\Repositories\Web;

use App\Interfaces\Web\ApartmentInterfaceWeb;
use App\Models\Admin\Apartment;
use App\Models\Admin\ApartmentFloorPlan;
use App\Models\Admin\Building;

class ApartmentRepositoryWeb implements ApartmentInterfaceWeb
{

    public function overview($unit)
    {
        $apartment = Apartment::where('unit_code', $unit)->first();

        return $apartment;
    }

    public function buildingOrigin($slug)
    {
        Building::where('building_slug', $slug)->exists();

        $building = Building::where('building_slug', $slug)->first();

        return $building;
    }
}
