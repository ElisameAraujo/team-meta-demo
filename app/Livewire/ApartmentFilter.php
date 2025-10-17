<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cookie;

class ApartmentFilter extends Component
{
    public $floors;
    public $ambients;
    public $status;
    public $selectedFloor = null;
    public $selectedAmbient = null;
    public $selectedStatus = null;
    public $favoritesOnly = false;
    public $orderBy = 'id_asc';
    public $allApartments;
    public $filteredApartments = [];
    public $filtersOpen = true;
    public $sideMenuOpen = true;
    public function mount($apartments, $floors, $ambients, $status)
    {
        $this->selectedFloor = Cookie::get('selectedFloor');
        $this->selectedAmbient = Cookie::get('selectedAmbient');
        $this->selectedStatus = Cookie::get('selectedStatus');
        $this->favoritesOnly = Cookie::get('favoritesOnly', false);
        $this->orderBy = Cookie::get('orderBy', 'id_asc');
        $this->filtersOpen = Cookie::get('filtersOpen', '1') === '1';
        $this->sideMenuOpen = Cookie::get('sideMenuOpen', '1') === '1';


        $this->allApartments = $apartments;
        $this->floors = $floors;
        $this->ambients = $ambients;
        $this->status = $status;

        $this->filterApartments();
    }


    public function updated($property)
    {
        $this->filterApartments();
    }

    public function toggleSideMenu()
    {
        $this->sideMenuOpen = !$this->sideMenuOpen;
        Cookie::queue('sideMenuOpen', $this->sideMenuOpen ? '1' : '0');
    }

    public function getActiveFiltersCountProperty()
    {
        $count = 0;

        if (!empty($this->selectedFloor)) $count++;
        if (!empty($this->selectedAmbient)) $count++;
        if (!empty($this->selectedStatus)) $count++;
        if ($this->favoritesOnly) $count++;

        return $count;
    }

    public function toggleFilters()
    {
        $this->filtersOpen = !$this->filtersOpen;

        // Persistência do estado
        Cookie::queue('filtersOpen', $this->filtersOpen ? '1' : '0');
    }

    public function filterApartments()
    {
        $filtered = collect($this->allApartments);

        // Aplica apenas se o filtro estiver ativo
        if ($this->selectedFloor !== null && $this->selectedFloor !== '') {
            $filtered = $filtered->where('floor', $this->selectedFloor);
        }

        if ($this->selectedAmbient !== null && $this->selectedAmbient !== '') {
            $filtered = $filtered->where('ambients', $this->selectedAmbient);
        }

        if ($this->selectedStatus !== null && $this->selectedStatus !== '') {
            $filtered = $filtered->where('apartment_status_id', $this->selectedStatus);
        }

        if ($this->favoritesOnly) {
            $filtered = $filtered->where('is_favorite', true);
        }

        // Ordenação
        $filtered = match ($this->orderBy) {
            'value_asc' => $filtered->sortBy('price'),
            'value_desc' => $filtered->sortByDesc('price'),
            'size_asc' => $filtered->sortBy('covered_area'),
            'size_desc' => $filtered->sortByDesc('covered_area'),
            'id_desc' => $filtered->sortByDesc('id'),
            default => $filtered->sortBy('id'),
        };

        $this->filteredApartments = $filtered->values();
        Cookie::queue('selectedFloor', $this->selectedFloor);
        Cookie::queue('selectedAmbient', $this->selectedAmbient);
        Cookie::queue('selectedStatus', $this->selectedStatus);
        Cookie::queue('favoritesOnly', $this->favoritesOnly);
        Cookie::queue('orderBy', $this->orderBy);
    }


    public function render()
    {
        return view('livewire.apartment-filter');
    }
}
