<dialog id="building_gallery_update" class="modal">
    <div class="modal-box">
        <form action="{{ route('admin.buildings.update-building-gallery') }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="update-image-area" data-update>
                <div class="current-image" data-preview-current>
                    <div class="p-8 no-image">Image/Video Not Selected</div>
                </div>

                <div class="image-preview hidden" data-preview></div>

                <div class="change-current-image">
                    <button type="button" class="btn btn-primary w-full" data-change-trigger>
                        Select an Image/Video
                    </button>
                    <input type="file" name="building_section" data-file-input data-update>
                </div>

                <div class="upload-new-image hidden">
                    <button type="submit" class="btn btn-primary w-full" data-upload-trigger>
                        Upload Image
                    </button>
                </div>
                <div id="hidden-inputs"></div>
            </div>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
