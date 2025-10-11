<?php

namespace App\Interfaces;

use App\Models\Admin\Building;
use App\Models\Admin\BuildingGallery;

interface BuildingInterface
{
    public function saveBuilding(array $data);
    public function updateBuilding(Building $building, array $data);
    public function updateSectionImage(Building $building, object $data);
    public function deleteBuilding(Building $building);
}
