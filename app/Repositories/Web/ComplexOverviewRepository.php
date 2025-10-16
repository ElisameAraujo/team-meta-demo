<?php

namespace App\Repositories\Web;

use App\Interfaces\Web\ComplexOverviewInterface;
use App\Models\Admin\BuildingGallery;

class ComplexOverviewRepository implements ComplexOverviewInterface
{
    public function complexSectionImage($section_id)
    {
        $image = BuildingGallery::where('section_id', $section_id)
            ->whereNull('building_id')
            ->first();

        return $image;
    }

    public function complexOverviewImage()
    {
        $complex = BuildingGallery::where('type', 'complex')
            ->select('building_image')
            ->first();

        $image = $complex->building_image;

        return $image;
    }
}
