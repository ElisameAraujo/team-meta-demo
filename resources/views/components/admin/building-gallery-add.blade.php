<dialog id="building_gallery_add" class="modal">
    <div class="modal-box">
        <form action="{{ route('admin.buildings.save-building-gallery') }}" method="post" enctype="multipart/form-data">
            @csrf
            <fieldset class="fieldset">
                <legend class="fieldset-legend">Section</legend>
                <select class="select w-full" name="section_id">
                    @foreach ($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                    @endforeach
                </select>
            </fieldset>

            <fieldset class="fieldset">
                <legend class="fieldset-legend">Image Complex</legend>
            </fieldset>
            <div class="update-image-area" data-add>
                <div class="current-image" data-preview-current>
                    <div class="p-8 no-image">Image/Video Not Selected</div>
                </div>

                <div class="image-preview hidden" data-preview></div>

                <div class="change-current-image">
                    <button type="button" class="btn btn-primary w-full" data-change-trigger>
                        Select an Image/Video
                    </button>
                    <input type="file" name="building_section" data-file-input data-add>
                </div>

                <div class="upload-new-image hidden">
                    <button type="submit" class="btn btn-primary w-full" data-upload-trigger>
                        Upload Image
                    </button>
                </div>

                <input type="hidden" name="building_id" value="{{ $building->id }}">
                <input type="hidden" name="building_slug" value="{{ $building->building_slug }}">
            </div>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
