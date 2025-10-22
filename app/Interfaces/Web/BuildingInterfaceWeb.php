<?php

namespace App\Interfaces\Web;

interface BuildingInterfaceWeb
{
    public function buildingOverview($slug);
    public function apartments($slug);
    public function apartmentsPerSection($slug, $section);
    public function floors($slug);
    public function ambients($slug);
    public function coordinates(string $slug, string $section);
    public function sectionImage($building_id, $section_id);
    public function overviewImage($building_id);
}
