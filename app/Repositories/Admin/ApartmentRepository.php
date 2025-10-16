<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\ApartmentInterface;
use App\Models\Admin\Apartment;
use App\Models\Admin\ApartmentCoordinate;

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

    public function updateCoordinates($coordinates)
    {
        return ApartmentCoordinate::updateOrCreate(['apartment_id' => $coordinates['apartment_id']], $coordinates);
    }

    public function deleteApartment($apartment)
    {
        return $apartment->delete();
    }
}
