<?php

namespace App\Repositories\Admin;

use App\Helpers\DiskHelper;
use App\Interfaces\Admin\ApartmentInterface;
use App\Models\Admin\Apartment;
use App\Models\Admin\ApartmentCoordinate;
use App\Models\Admin\ApartmentFloorPlan;
use App\Models\Admin\Building;
use App\Models\Admin\BuildingGallery;
use Illuminate\Support\Facades\Storage;

class ApartmentRepository implements ApartmentInterface
{
    public function saveApartment($building, $data)
    {
        $dataArray = array_merge($data, ['building_id' => $building->id]);

        $apartment = Apartment::create($dataArray);

        return $apartment;
    }

    public function updateApartment($apartment, $data)
    {
        return $apartment->update($data);
    }

    public function buildingBackground($building): BuildingGallery
    {

        $image = BuildingGallery::where('building_id', $building)
            ->first();

        return $image;
    }

    public function updateCoordinates($coordinates)
    {
        return ApartmentCoordinate::updateOrCreate(['apartment_id' => $coordinates['apartment_id']], $coordinates);
    }

    public function floorPlanImage(object $data)
    {
        // Busca o registro existente na galeria
        $floorPlan = ApartmentFloorPlan::find($data->gallery_id);
        //dd($floorPlan);
        //Encontra o apartamento e o Prédio
        $apartment = Apartment::findOrFail($data->apartment_id);
        $building = Building::findOrFail($apartment->building->id);

        // Armazena nova imagem
        $newPath = DiskHelper::storeImage($data->floor_plan_image, 'apartments', $building->building_slug);

        // Se não existe imagem anterior, cria novo registro
        if (!$floorPlan) {
            $apartment->floorPlan()->create([
                'floor_plan_image' => $newPath,
            ]);

            return true;
        }

        // Remove imagem anterior se existir
        if (Storage::disk('apartments')->exists($floorPlan->floor_plan_image)) {
            Storage::disk('apartments')->delete($floorPlan->floor_plan_image);
        }

        // Atualiza o registro existente
        $floorPlan->update([
            'floor_plan_image' => $newPath,
        ]);

        return true;
    }

    public function deleteApartment($apartment)
    {
        return $apartment->delete();
    }
}
