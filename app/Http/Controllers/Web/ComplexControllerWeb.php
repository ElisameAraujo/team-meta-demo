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

        //Transitions
        $currentSide = 'complex:front';
        $fromKey = $_COOKIE['fromKey'] ?? null;
        $toKey = $currentSide;
        $type = explode(':', $fromKey)[0] ?? null;

        $transition = null;
        if ($fromKey && $fromKey !== $toKey) {
            $transition = TransitionsGallery::where('from_key', $fromKey)
                ->where('to_key', $toKey)
                ->where('type', $type)
                ->first();
        }

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
        $section = Section::where('section_slug', $section)->first();
        $buildings = Building::buildingsList();

        $pageImage = $this->complex->complexSectionImage($section->id);

        $sections = Section::all();
        $floors = Apartment::floors();
        $ambients = Apartment::ambients();

        $status = ApartmentStatus::all();
        $apartments = Apartment::all();

        //Transitions
        $currentSide = 'complex:' . $section->section_slug;
        $fromKey = $_COOKIE['fromKey'] ?? null;
        $toKey = 'complex:' . $section->section_slug;
        $type = explode(':', $fromKey)[0] ?? null;

        $transition = null;
        if ($fromKey && $fromKey !== $toKey) {
            $transition = TransitionsGallery::where('from_key', $fromKey)
                ->where('to_key', $toKey)
                ->where('type', $type)
                ->first();
        }

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
}
