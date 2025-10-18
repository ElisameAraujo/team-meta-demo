<dialog id="new_transition" class="modal">
    <div class="modal-box">
        <form x-data="{ fromKey: '' }" method="post" enctype="multipart/form-data" action="{{ route('admin.transitions.add-transition') }}">
            @csrf
            <h1 class="text-xl">Add Transition</h1>

            <fieldset class="fieldset">
                <legend class="fieldset-legend">From</legend>
                <select class="select w-full" name="from_key" x-model="fromKey">
                    <option disabled selected value="">-- Select an Section --</option>
                    @foreach ($sections as $s)
                        <option value="{{ $s->section_slug }}">{{ $s->section_name }}</option>
                    @endforeach
                </select>
            </fieldset>

            <fieldset class="fieldset">
                <legend class="fieldset-legend">To</legend>
                <select class="select w-full" name="to_key">
                    @foreach ($sections as $s)
                        <option value="{{ $s->section_slug }}" :disabled="fromKey === '{{ $s->section_slug }}'">
                            {{ $s->section_name }}
                        </option>
                    @endforeach
                </select>
            </fieldset>

            <fieldset class="fieldset">
                <legend class="fieldset-legend">Transition File</legend>
                <input type="file" class="file-input w-full" name="video_path" />
            </fieldset>

            <input type="hidden" name="type" id="type_transition">
            <button type="submit" class="btn btn-primary mt-2">Send Transition</button>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>