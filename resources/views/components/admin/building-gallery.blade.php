<dialog id="building_gallery" class="modal">
    <div class="modal-box">
        <form action="{{ route('admin.buildings.update-building-gallery', ['building' => $building->id]) }}"
            method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="update-image-area" data-gallery>
                <div class="current-image">
                    <div class="p-8 no-image" id="current-image-preview">Image Not Selected</div>
                </div>

                <div class="image-preview hidden">
                    <img id="preview">
                </div>

                <div class="change-current-image">
                    <button type="button" class="btn btn-primary w-full" id="change-image">Select an
                        Image/Video</button>
                    <input type="file" name="building_section" id="background" data-gallery>
                </div>

                <div class="upload-new-image hidden">
                    <button type="submit" class="btn btn-primary w-full" id="upload-image">Upload Image</button>
                </div>
            </div>

            <input type="hidden" name="section_id" id="modal-section-id">
            <input type="hidden" name="type" id="modal-section-slug">
            <input type="hidden" name="gallery_id" id="modal-gallery-id">

        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>