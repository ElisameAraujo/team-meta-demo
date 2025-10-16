<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Interfaces\Web\ComplexOverviewInterface;
use App\Models\Admin\Apartment;
use App\Models\Admin\ApartmentStatus;
use App\Models\Admin\Building;
use App\Models\Admin\Section;
use Illuminate\Http\Request;

class ComplexControllerWeb extends Controller
{
    public function __construct(private ComplexOverviewInterface $complex) {}
    public function index()
    {
        $buildings = Building::select('building_name', 'building_slug')->get();

        $ambients = Apartment::ambients();
        $floors = Apartment::floors();

        $sections = Section::all();
        $apartments = Apartment::all();
        $status = ApartmentStatus::all();

        $complexBackground = $this->complex->complexOverviewImage();

        return view('web.index', compact(
            'buildings',
            'sections',
            'apartments',
            'status',
            'ambients',
            'floors',
            'complexBackground'
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

        return view('web.overview.section', compact(
            'section',
            'pageImage',
            'buildings',
            'sections',
            'floors',
            'ambients',
            'status',
            'apartments'
        ));
    }
}
