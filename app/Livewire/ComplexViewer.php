<?php

namespace App\Livewire;

use App\Helpers\AssetHelper;
use App\Interfaces\Web\ComplexOverviewInterface;
use App\Models\Admin\{Apartment, ApartmentStatus, Building, Section, TransitionsGallery};
use Livewire\Attributes\On;
use Livewire\Component;

class ComplexViewer extends Component
{
    public $sectionSlug = null;
    public $section = null;
    private ComplexOverviewInterface $complex;
    public $buildings = [];
    public $sections = [];
    public $apartments = [];
    public $floors = [];
    public $ambients = [];
    public $status = [];
    public $loopVideo;
    public $transition;
    public $currentSide;
    public $complexBackground;
    public $pageImage;
    protected $listeners = ['changeSection' => 'goToSection'];


    public function mount(ComplexOverviewInterface $complex, $sectionSlug = null)
    {
        $this->complex = $complex;
        $this->sectionSlug = $sectionSlug;

        $this->buildings = Building::buildingsList();
        $this->sections = Section::all();
        $this->apartments = Apartment::all();
        $this->floors = Apartment::floors();
        $this->ambients = Apartment::ambients();
        $this->status = ApartmentStatus::all();

        $this->loadSection();
    }

    private function loadSection()
    {
        if ($this->sectionSlug === null) {
            $this->loopVideo = AssetHelper::assetURL('complex', $this->complex->complexOverviewImage());
            $this->transition = $this->resolveTransition('complex:overview');
        } else {
            $this->section = Section::where('section_slug', $this->sectionSlug)->firstOrFail();
            $this->loopVideo = AssetHelper::assetURL('complex', $this->complex->complexSectionImage($this->section->id));
            $this->transition = $this->resolveTransition('complex:' . $this->section->section_slug);
        }
    }

    #[On('change-section')]
    public function changeSection($slug)
    {
        logger('Botão clicado: ' . $slug);
        $this->sectionSlug = $slug;
        $this->loadSection();
    }



    private function resolveTransition($toKey)
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

    public function getLoopVideoProperty()
    {
        return $this->loopVideo;
    }
    public function render()
    {
        return view('livewire.complex-viewer');
    }
}
