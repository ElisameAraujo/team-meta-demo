@extends('layouts.admin')
@section('title', 'Complex Configuration')

@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                @yield('title')
            </h1>
        </div>
        @include('components.flash-messages')
        <div class="page-header">
            <h1>
                Slides
            </h1>
        </div>
        @include('components.admin.complex-image-add')
        @include('components.admin.complex-image-update')
        @include('components.admin.new-transition')

        <div class="page-actions">
            <button class="btn btn-success" onclick="complex_image_add.showModal()" data-mode="add">
                <i class="fa-solid fa-plus"></i> New Slide
            </button>
        </div>
        <div class="col-span-12 mt-4">
            <div class="image-gallery">
                @foreach ($complexGallery as $item)
                    <div class="image-item">
                        <div class="image-thumb">
                            <img src="{{ AssetHelper::assetURL('complex', $item->building_image, 'img/placeholders/building-image-not-found.jpg') }}" />
                        </div>

                        <div class="image-actions">
                            <h1>{{ optional($item->section)->section_name ?? 'Overview' }}</h1>
                            <button data-mode="update" data-target="complex_image_update" data-section-id="{{ optional($item->section)->id }}" data-section-slug="{{ optional($item->section)->section_slug }}" data-image-url="{{ AssetHelper::assetURL('complex', $item->building_image) }}" data-gallery-id="{{ $item?->id }}" onclick="complex_image_update.showModal()" class="open-gallery-modal">
                                <i class="fa-solid fa-arrows-rotate"></i> Change Image/Video
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="page-header">
            <h1>
                Transitions
            </h1>
        </div>
        <div class="page-actions">
            <button class="btn btn-success" onclick="openTransitionModal(this)" data-type="complex">
                <i class="fa-solid fa-plus"></i> New Transition
            </button>
        </div>
        <div class="col-span-12">
            <div class="col-span-12">
                <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Origin</th>
                                <th>Destination</th>
                                <th>Type</th>
                                <th>Video Path</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transitions as $transition)
                                <tr>
                                    <td>{{ $transition->id }}</td>
                                    <td>{{ $transition->origin }}</td>
                                    <td>{{ $transition->destination }}</td>
                                    <td>{{ $transition->type_transition }}</td>
                                    <td>{{ $transition->video_url }}</td>
                                    <td>{{ $transition->created_at }}</td>
                                    <td>{{ $transition->updated_at }}</td>
                                    <td>
                                        <div class="join">
                                            <a href="{{-- {{ route('admin.buildings.edit-building', ['building' => $building->id]) }} --}}" class="btn btn-info btn-sm text-white join-item tooltip font-normal" data-tip="Edit">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <form action="{{-- {{ route('admin.buildings.delete-building', $building->id) }} --}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-error btn-sm text-white join-item tooltip font-normal" data-tip="Remove">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                {{$transitions->links()}}
            </div>
        </div>
    </div>
@endsection
<script>
    function openTransitionModal(button) {
        const type = button.getAttribute('data-type');
        document.getElementById('type_transition').value = type;
        document.getElementById('new_transition').showModal();
    }
</script>