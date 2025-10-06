<?php

namespace App\Repositories;

use App\Interfaces\ApartmentInterface;
use App\Models\Admin\Apartment;

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

    public function deleteApartment($apartment)
    {
        return $apartment->delete();
    }
}
