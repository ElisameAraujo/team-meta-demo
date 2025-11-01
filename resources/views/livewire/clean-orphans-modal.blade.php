<!-- resources/views/livewire/clean-orphans-modal.blade.php -->
<div>
    <div class="mb-4">
        <p><strong>Selected Files:</strong> {{ count($selected) }}</p>
        <p><strong>Total Size:</strong> {{ DiskHelper::sizeFormat($selectedSize) }}</p>
    </div>

    <button wire:click="toggleSelectAll" class="btn btn-sm btn-outline mb-4">
        {{ count($selected) === count($orphans) ? 'Deselect All' : 'Select All' }}
    </button>

    <div class="grid grid-cols-2 gap-2 max-h-64 overflow-y-auto">
        @foreach ($orphans as $file)
            <label class="flex items-center gap-2">
                <input type="checkbox" wire:model="selected" wire:change="recalculateSelectedSize"
                    value="{{ $file['path'] }}" class="checkbox" />

                <span>{{ $file['name'] }} ({{ $file['size'] }})</span>
            </label>
        @endforeach
    </div>


    <div class="mt-6">
        <div role="alert" class="alert alert-error text-white">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <span>NOTE: This action cannot be undone. Proceed with caution.</span>
        </div>
    </div>

    <label class="flex items-center gap-2 mb-4 mt-4">
        <input type="checkbox" wire:model="simulate" class="checkbox">
        <span>Simulate deletion (don't delete files)</span>
    </label>

    <div class="modal-action">
        <button wire:click="cleanSelected" class="btn btn-error text-white">Remove Selected</button>

        <button onclick="cleanOrphans.close()" class="btn">Cancel</button>
    </div>
</div>
