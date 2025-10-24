<?php

namespace App\Repositories\Admin;

use App\Helpers\DiskHelper;
use App\Interfaces\Admin\BuildingInterface;
use App\Models\Admin\Building;
use App\Models\Admin\BuildingGallery;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BuildingRepository implements BuildingInterface
{

    public function saveBuilding(array $data)
    {
        $slug = Str::slug($data['building_name']);
        $dataArray = array_merge($data, ['building_slug' => $slug]);

        $building = Building::create($dataArray);

        return $building;
    }

    public function updateBuilding($building, $data)
    {
        $slug = Str::slug($data['building_name']);
        $dataArray = array_merge($data, ['building_slug' => $slug]);

        return $building->update($dataArray);
    }

    public function saveGalleryItem(object $data)
    {
        $imagePath = DiskHelper::storeImage($data->building_section, 'buildings', $data->building_slug);

        BuildingGallery::create([
            'building_image' => $imagePath,
            'type' => $data->building_slug,
            'section_id' => $data->section_id,
            'building_id' => $data->building_id,
        ]);

        return true;
    }

    public function updateGalleryItem(object $data): bool
    {
        // Busca o registro existente na galeria
        $sectionImage = BuildingGallery::findOrFail($data->gallery_id);

        // Armazena nova imagem
        $newPath = DiskHelper::storeImage($data->building_section, 'buildings', $data->building_slug);

        // Remove imagem anterior se existir
        if (Storage::disk('buildings')->exists($sectionImage->building_image)) {
            Storage::disk('buildings')->delete($sectionImage->building_image);
        }

        $sectionImage->update([
            'building_image' => $newPath,
            'section_id' => $sectionImage->section_id,
            'type' => $sectionImage->type,
        ]);

        return true;
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
