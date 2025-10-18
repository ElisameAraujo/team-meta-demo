<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Admin\ComplexInterface;
use App\Models\Admin\BuildingGallery;
use App\Models\Admin\Section;
use App\Models\Admin\TransitionsGallery;
use Illuminate\Http\Request;

class ComplexController extends Controller
{

    public function __construct(private ComplexInterface $complex) {}
    public function complexConfiguration()
    {
        $sections = Section::all();
        $complexGallery = BuildingGallery::with('section')->whereNull('building_id')->get();
        $transitions = TransitionsGallery::where('type', 'complex')->paginate(20);

        return view('admin.configuration.complex-configuration', compact('sections', 'complexGallery', 'transitions'));
    }

    public function addOverviewComplexImage(Request $request)
    {
        $data = (object) $request->except('_token');

        if ($request->hasFile('complex_overview')) {
            $this->complex->addOverviewComplexImage($data);
        } else {
            return redirect()->back()->with('error', 'No image file selected');
        }


        return redirect()->back()->with('success', 'Complex overview image updated successfully.');
    }

    public function updateOverviewComplexImage(Request $request)
    {
        $data = (object) $request->except('_token');

        if ($request->hasFile('complex_overview')) {
            $this->complex->updateOverviewComplexImage($data);
        } else {
            return redirect()->back()->with('error', 'No image file selected');
        }

        return redirect()->back()->with('success', 'Complex overview image updated successfully.');
    }
}
