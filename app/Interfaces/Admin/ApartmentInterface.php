<?php

namespace App\Interfaces\Admin;

use App\Models\Admin\Apartment;
use App\Models\Admin\Building;

interface ApartmentInterface
{
    public function saveApartment(Building $building, array $data);
    public function updateApartment(Apartment $apartment, array $data);
    public function updateCoordinates(array $coordinates);
    public function deleteApartment(Apartment $apartment);
}
