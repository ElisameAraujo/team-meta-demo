<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Interfaces\Web\ComplexOverviewInterface;
use App\Models\Admin\{
    Apartment,
    ApartmentStatus,
    Building,
    Section,
    TransitionsGallery
};
use Illuminate\Http\Request;

class ComplexControllerWeb extends Controller
{
    public function __construct(private ComplexOverviewInterface $complex) {}
    public function index()
    {
        $buildings = Building::buildingsList();
        $ambients = Apartment::ambients();
        $floors = Apartment::floors();
        $sections = Section::all();
        $apartments = Apartment::all();
        $status = ApartmentStatus::all();

        $complexBackground = $this->complex->complexOverviewImage();
        $currentSide = 'complex:overview';

        $transition = $this->getTransition($currentSide);

        return view('web.index', compact(
            'buildings',
            'sections',
            'apartments',
            'status',
            'ambients',
            'floors',
            'complexBackground',
            'currentSide',
            'transition'
        ));
    }

    public function sectionComplexOverview($section)
    {
        $section = Section::where('section_slug', $section)->firstOrFail();
        $toKey = 'complex:' . $section->section_slug;
        $transition = $this->getTransition($toKey);

        $buildings = Building::buildingsList();
        $pageImage = $this->complex->complexSectionImage($section->id);
        $sections = Section::all();
        $floors = Apartment::floors();
        $ambients = Apartment::ambients();
        $status = ApartmentStatus::all();
        $apartments = Apartment::all();
        $currentSide = $toKey;

        return view('web.overview.section', compact(
            'section',
            'pageImage',
            'buildings',
            'sections',
            'floors',
            'ambients',
            'status',
            'apartments',
            'currentSide',
            'transition'
        ));
    }

    private function getTransition(string $toKey): ?TransitionsGallery
    {
        $fromKey = $_COOKIE['fromKey'] ?? null;
        $type = explode(':', $fromKey)[0] ?? null;

        if ($fromKey && $fromKey !== $toKey) {
            return TransitionsGallery::where('from_key', $fromKey)
                ->where('to_key', $toKey)
                ->where('type', $type)
                ->first();
        }

        return null;
    }
}
