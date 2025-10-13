<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Interfaces\Web\ComplexOverviewInterface;
use App\Models\Admin\{Apartment, ApartmentStatus, Building, Section};
use Illuminate\Http\Request;

class SectionOverviewController extends Controller
{

    public function __construct(private ComplexOverviewInterface $complex) {}
    public function sectionOverview($section)
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
