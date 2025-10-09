<dialog id="building_overview" class="modal">
    <div class="modal-box">
        <form action="{{ route('admin.buildings.update-building-image-overview', ['building' => $building->id]) }}"
            method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="update-image-area" data-overview>
                <div class="current-image">
                    @if (!Utilities::exists('buildings', $building->overviewImage->building_image ?? null))
                        <div class="p-8 no-image" id="current-image-preview">Image Not Selected</div>
                    @else
                        <img src="{{ Utilities::url('buildings', $building->overviewImage->building_image ?? null) }}"
                            id="current-image-preview">
                    @endif
                </div>

                <div class="image-preview hidden">
                    <img id="preview">
                </div>

                <div class="change-current-image">
                    <button type="button" class="btn btn-primary w-full" id="change-image">Select an
                        Image/Video</button>
                    <input type="file" name="building_image" id="background" data-overview>
                </div>

                <div class="upload-new-image hidden">
                    <button type="submit" class="btn btn-primary w-full" id="upload-image">Upload Image</button>
                </div>
            </div>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>