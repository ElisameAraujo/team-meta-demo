<?php

namespace App\Repositories;

use App\Interfaces\BuildingInterface;
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

    public function updateSectionImage(Building $building, object $data): bool
    {
        // Validação mínima dos dados esperados
        if (!isset($data->building_section, $data->section_id, $data->type)) {
            throw new \InvalidArgumentException('Dados incompletos para atualizar imagem da seção.');
        }

        // Busca o registro existente na galeria
        $sectionImage = BuildingGallery::find($data->gallery_id);

        // Armazena nova imagem
        $newPath = $this->storeImage($data->building_section, 'buildings', $building->building_slug);

        // Se não existe imagem anterior, cria novo registro
        if (!$sectionImage) {
            $building->gallery()->create([
                'building_image' => $newPath,
                'section_id' => $data->section_id,
                'type' => $data->type,
            ]);

            return true;
        }

        // Remove imagem anterior se existir
        if (Storage::disk('buildings')->exists($sectionImage->building_image)) {
            Storage::disk('buildings')->delete($sectionImage->building_image);
        }

        // Atualiza o registro existente
        $sectionImage->update([
            'building_image' => $newPath,
            'section_id' => $sectionImage->section_id,
            'type' => $sectionImage->type,
        ]);

        return true;
    }


    /**
     * Summary of storeImage
     * @param object $image Allow to create a complete name for the image that been stored in disks
     * @param string $disk Name of disk where the image must be saved
     * @param string $subfolder Allow to save the image in a subfolder of disk
     * @return string
     */
    private function storeImage($image, string $disk, string $subfolder = ''): string
    {
        $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $image->getClientOriginalExtension();
        $slug = Str::slug($filename);
        $finalName = "{$slug}-" . now()->format('YmdHis') . ".{$extension}";

        return $image->storeAs($subfolder, $finalName, ['disk' => $disk]);
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
