<?php

namespace App\Repositories;

use App\Interfaces\ComplexInterface;
use Illuminate\Support\Str;
use App\Models\Admin\BuildingGallery;
use App\Models\Admin\Section;
use Illuminate\Support\Facades\Storage;

class ComplexRepository implements ComplexInterface
{
    public function addOverviewComplexImage(object $data): bool
    {
        $sectionId = null;
        $type = $data->type;

        if ($type !== 'complex') {
            $section = Section::where('section_slug', $type)->first();

            if (!$section) {
                throw new \Exception("Seção '{$type}' não encontrada.");
            }

            $sectionId = $section->id;
            $type = $section->section_slug;
        }

        $image = $this->storeImage($data->complex_overview, 'complex');

        BuildingGallery::create([
            'building_image' => $image,
            'type' => $type,
            'section_id' => $sectionId,
            'building_id' => null,
        ]);

        return true;
    }
    public function updateOverviewComplexImage(object $data)
    {
        // Validação mínima dos dados esperados
        if (!isset($data->complex_overview, $data->section_id, $data->type)) {
            throw new \InvalidArgumentException('Dados incompletos para atualizar imagem da seção.');
        }

        // Busca o registro existente na galeria
        $sectionImage = BuildingGallery::findOrFail($data->gallery_id);
        //dd($sectionImage);

        // Armazena nova imagem
        $newPath = $this->storeImage($data->complex_overview, 'complex');

        // Remove imagem anterior se existir
        if (Storage::disk('complex')->exists($sectionImage->building_image)) {
            Storage::disk('complex')->delete($sectionImage->building_image);
        }

        $sectionImage->update([
            'building_image' => $newPath,
            'section_id' => $sectionImage->section_id,
            'type' => $sectionImage->type,
        ]);

        return true;
    }



    private function storeImage($image, string $disk): string
    {
        $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $image->getClientOriginalExtension();
        $slug = Str::slug($filename);
        $finalName = "{$slug}-" . now()->format('YmdHis') . ".{$extension}";

        return $image->storeAs($finalName, ['disk' => $disk]);
    }
}
