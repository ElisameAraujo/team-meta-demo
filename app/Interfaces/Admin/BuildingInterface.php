<?php

namespace App\Interfaces\Admin;

use App\Models\Admin\Building;

interface BuildingInterface
{
    public function saveBuilding(array $data);
    public function updateBuilding(Building $building, array $data);
    public function saveGalleryItem(object $data);
    public function updateGalleryItem(object $data);
    public function deleteBuilding(Building $building);
}
