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
    </div>
@endsection