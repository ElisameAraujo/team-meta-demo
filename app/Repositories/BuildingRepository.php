<?php

namespace App\Repositories;

use App\Interfaces\BuildingInterface;
use App\Models\Admin\Building;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BuildingRepository implements BuildingInterface
{

    public function saveBuilding(array $data, $image)
    {
        $background = $this->storeImage($image);
        $slug = Str::slug($data['building_name']);
        $dataArray = array_merge($data, ['background' => $background, 'building_slug' => $slug]);

        $building = Building::create($dataArray);

        return $building;
    }

    public function updateBuilding($building, $data)
    {
        $slug = Str::slug($data['building_name']);
        $dataArray = array_merge($data, ['building_slug' => $slug]);

        return $building->update($dataArray);
    }

    public function updateBuildingImage(Building $building, $image): bool
    {
        $path = $building->background;

        if (!empty($path) && Storage::disk('buildings')->exists($path)) {
            Storage::disk('buildings')->delete($path);
        }

        $building->background = $this->storeImage($image);
        return $building->save();
    }

    private function storeImage($image): string
    {
        $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $image->getClientOriginalExtension();
        $slug = Str::slug($filename);
        $finalName = "{$slug}-" . now()->format('YmdHis') . ".{$extension}";

        return $image->storeAs('', $finalName, ['disk' => 'buildings']);
    }


    public function deleteBuilding($building)
    {
        $path = $building->background;

        if (!empty($path) && Storage::disk('buildings')->exists($path)) {
            Storage::disk('buildings')->delete($path);
        }

        return $building->delete();
    }
}
