<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use App\Helpers\DiskHelper;

class CleanOrphansModal extends Component
{
    public $orphans = [];
    public $selected = [];
    public $selectedSize = 0;
    public bool $simulate = true;

    public function mount()
    {
        $this->orphans = collect()
            ->merge(DiskHelper::scanDisk('complex'))
            ->merge(DiskHelper::scanDisk('buildings'))
            ->merge(DiskHelper::scanDisk('apartments'))
            ->merge(DiskHelper::scanDisk('transitions'))
            ->filter(fn($file) => $file['is_orphan'])
            ->values()
            ->toArray();

        $this->selected = [];
        $this->selectedSize = 0;
    }

    public function updatedSelected()
    {
        $this->recalculateSelectedSize();
    }

    public function toggleSelectAll()
    {
        if (count($this->selected) === count($this->orphans)) {
            $this->selected = [];
        } else {
            $this->selected = array_column($this->orphans, 'path');
        }

        $this->recalculateSelectedSize();
    }

    public function recalculateSelectedSize()
    {
        $this->selectedSize = array_reduce($this->orphans, function ($carry, $file) {
            return in_array($file['path'], $this->selected)
                ? $carry + DiskHelper::sizeToBytes($file['size'])
                : $carry;
        }, 0);
    }

    public function cleanSelected()
    {
        $deleted = 0;

        foreach ($this->orphans as $file) {
            if (in_array($file['path'], $this->selected)) {
                if (! $this->simulate) {
                    try {
                        Storage::disk($file['disk'])->delete($file['path']);
                        $deleted++;
                    } catch (\Exception $e) {
                        // log se necessário
                    }
                } else {
                    $deleted++;
                }
            }
        }

        $message = $this->simulate
            ? "{$deleted} file(s) would be removed (simulation). No file(s) were deleted."
            : ($deleted > 0
                ? "{$deleted} orphaned file(s) were successfully removed."
                : "No file(s) were removed.");

        $type = $this->simulate
            ? 'simulation'
            : ($deleted > 0 ? 'success' : 'error');

        // Dispara os eventos
        $this->dispatch('close-modal');
        $this->dispatch('refresh-storage-stats');
        $this->dispatch('custom-alert', [
            'type' => $type,
            'message' => $message,
        ]);
    }


    public function render()
    {
        return view('livewire.clean-orphans-modal');
    }
}
