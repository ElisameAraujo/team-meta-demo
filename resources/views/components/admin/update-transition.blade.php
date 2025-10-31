<dialog id="update_transition" class="modal">
    <div class="modal-box">
        <form x-data="{ fromKey: '', toKey: '' }" method="post" enctype="multipart/form-data"
            action="{{ route('admin.transitions.update-transition') }}">
            @method('PUT')
            @csrf
            <h1 class="text-xl">Update Transition</h1>

            <fieldset class="fieldset">
                <legend class="fieldset-legend">From</legend>
                <select class="select w-full" name="from_key" x-model="fromKey">
                    <option disabled selected value="">-- Select an Section --</option>
                    @foreach ($sections as $section)
                        <option value="{{ $section->section_slug }}">
                            {{ $section->section_name }}
                        </option>
                    @endforeach
                    @foreach ($sections as $section)
                        <option value="zoom-in-{{ $section->section_slug }}">
                            Zoom In ({{ $section->section_name }})
                        </option>
                        <option value="zoom-out-{{ $section->section_slug }}">
                            Zoom Out ({{ $section->section_name }})
                        </option>
                    @endforeach

                </select>
            </fieldset>

            <fieldset class="fieldset">
                <legend class="fieldset-legend">To</legend>
                <select class="select w-full" name="to_key" x-model="toKey">
                    @foreach ($sections as $section)
                        <option value="{{ $section->section_slug }}"
                            :disabled="fromKey === '{{ $section->section_slug }}'">
                            {{ $section->section_name }}
                        </option>
                    @endforeach
                    @foreach ($sections as $section)
                        <option value="zoom-in-{{ $section->section_slug }}"
                            :disabled="fromKey === 'zoom-in-{{ $section->section_slug }}'">
                            Zoom In ({{ $section->section_name }})
                        </option>

                        <option value="zoom-out-{{ $section->section_slug }}"
                            :disabled="fromKey === 'zoom-out-{{ $section->section_slug }}'">
                            Zoom Out ({{ $section->section_name }})
                        </option>
                    @endforeach
                </select>
            </fieldset>

            <fieldset class="fieldset">
                <legend class="fieldset-legend">Transition File</legend>
                <input type="file" class="file-input w-full" name="video_path" />
            </fieldset>

            <div id="hidden-inputs"></div>
            <button type="submit" class="btn btn-primary mt-2">Update Transition</button>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
