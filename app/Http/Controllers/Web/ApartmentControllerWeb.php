<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Interfaces\Web\ApartmentInterfaceWeb;
use App\Models\Admin\{Building, Section};
use App\Models\Admin\TransitionsGallery;
use Illuminate\Http\Request;

class ApartmentControllerWeb extends Controller
{
    public function __construct(private ApartmentInterfaceWeb $apartment) {}
    public function index($buildingSlug, $unit)
    {
        $apartment = $this->apartment->overview($unit);
        $building = $this->apartment->buildingOrigin($buildingSlug);

        if ($_COOKIE['fromKey'] === 'complex:front' ?? null) {
            $fromKey = $_COOKIE['fromKey'] ?? null;
            $toKey = 'complex:zoom-in-front';
        } else {
            $fromKey = $_COOKIE['fromKey'] ?? null;
            $toKey = 'complex:zoom-in-back';
        }

        $transition = null;
        if ($fromKey && $fromKey !== $toKey) {
            $transition = TransitionsGallery::where('from_key', $fromKey)
                ->where('to_key', $toKey)
                ->where('type', 'complex')
                ->first();
        }

        return view('web.apartments.index', compact('apartment', 'building', 'transition'));
    }
}
