<?php

namespace App\Livewire;

use App\Helpers\DiskHelper;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class StorageStats extends Component
{
    public array $stats = [];

    protected $listeners = ['refresh-storage-stats' => 'updateStats'];

    public function mount()
    {
        $this->updateStats();
    }

    public function updateStats()
    {
        $files = collect()
            ->merge(DiskHelper::scanDisk('complex'))
            ->merge(DiskHelper::scanDisk('buildings'))
            ->merge(DiskHelper::scanDisk('apartments'))
            ->merge(DiskHelper::scanDisk('transitions'))
            ->values()
            ->map(fn($file, $index) => [...$file, 'id' => $index + 1]);

        $this->stats = $this->getStorageStats($files);
    }

    private function getStorageStats(Collection $files): array
    {
        $totalFiles = $files->count();
        $totalSizeBytes = $files->sum(fn($file) => DiskHelper::sizeToBytes($file['size']));

        $orphans = $files->filter(fn($file) => $file['is_orphan']);
        $orphanCount = $orphans->count();
        $orphanSizeBytes = $orphans->sum(fn($file) => DiskHelper::sizeToBytes($file['size']));
        $orphanPercentage = $totalSizeBytes > 0
            ? round(($orphanSizeBytes / $totalSizeBytes) * 100, 1)
            : 0;

        $disks = count(File::directories(storage_path('app/public')));


        return [
            ['title' => 'Disks in Use', 'value' => $disks],
            ['title' => 'Total of Files in Disks', 'value' => $totalFiles],
            ['title' => 'Total Disks Size', 'value' => DiskHelper::sizeFormat($totalSizeBytes)],
            ['title' => 'Orphans Files', 'value' => $orphanCount],
            ['title' => 'Orphans Files Size', 'value' => DiskHelper::sizeFormat($orphanSizeBytes) . " ({$orphanPercentage}%)"],
        ];
    }

    public function render()
    {
        return view('livewire.storage-stats');
    }
}
