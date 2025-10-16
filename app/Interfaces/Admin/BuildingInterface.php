<?php

namespace App\Interfaces\Admin;

use App\Models\Admin\Building;

interface BuildingInterface
{
    public function saveBuilding(array $data);
    public function updateBuilding(Building $building, array $data);
    public function updateSectionImage(Building $building, object $data);
    public function deleteBuilding(Building $building);
}
