<?php

namespace App\Interfaces\Web;

interface ApartmentInterfaceWeb
{
    public function overview($unit);
    public function buildingOrigin($slug);
}
