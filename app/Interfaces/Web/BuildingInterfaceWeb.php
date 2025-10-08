<?php

namespace App\Interfaces\Web;

interface BuildingInterfaceWeb
{
    public function buildingOverview($slug);
    public function apartments($slug);
    public function apartmentsPerSection($slug, $section);
    public function floors($slug);
    public function ambients($slug);
}
