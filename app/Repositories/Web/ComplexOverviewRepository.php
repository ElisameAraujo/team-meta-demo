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
}
