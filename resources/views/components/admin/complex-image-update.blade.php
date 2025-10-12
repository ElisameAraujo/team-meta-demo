<dialog id="complex_image_update" class="modal">
    <div class="modal-box">
        <form action="{{ route('admin.complex.update-complex-image-overview') }}" method="post"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="update-image-area" data-gallery>
                <div class="current-image">
                    <div class="p-8 no-image" data-preview>Image Not Selected</div>
                </div>

                <div class="image-preview hidden">
                    <img data-preview-image>
                </div>

                <div class="change-current-image">
                    <button type="button" class="btn btn-primary w-full" data-change-trigger>
                        Select an Image/Video
                    </button>
                    <input type="file" name="complex_overview" data-file-input data-gallery>
                </div>

                <div class="upload-new-image hidden">
                    <button type="submit" class="btn btn-primary w-full" data-upload-trigger>
                        Upload Image
                    </button>
                </div>
            </div>

            <input type="hidden" name="section_id" data-field="section-id">
            <input type="hidden" name="type" data-field="section-slug">
            <input type="hidden" name="gallery_id" data-field="gallery-id">
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>