<?php

namespace App\Interfaces;

use App\Models\Admin\Building;

interface BuildingInterface
{
    public function saveBuilding(array $data, $image);
    public function updateBuilding(Building $building, array $data);
    public function updateBuildingImage(Building $building, $image);
    public function deleteBuilding(Building $building);
}
