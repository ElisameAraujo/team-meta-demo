@extends('layouts.admin')
@section('title', 'Edit Building: ' . $building->building_name)
@section('breadcrumb', $building->building_name)

@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                @yield('title')
                <div class="breadcrumbs text-sm">
                    <ul>
                        <li>
                            <a href="{{ route('admin.buildings') }}">
                                <i class="fa-solid fa-building"></i>Buildings
                            </a>
                        </li>
                        <li><span><i class="fa-solid fa-pen-to-square"></i>Edit Building</span></li>
                        <li><span>@yield('breadcrumb')</span></li>
                    </ul>
                </div>
            </h1>
        </div>
        @include('components.flash-messages')
        @include('components.admin.building-overview-image')
        @include('components.admin.building-gallery')
        <div class="col-span-12 page-header">
            <h1>Building Details</h1>
            <form action="{{ route('admin.buildings.update-building', $building->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-items">
                    <fieldset class="fieldset col-span-12">
                        <legend class="fieldset-legend">Building Name</legend>
                        <input type="text" name="building_name" class="input w-full"
                            value="{{ $building->building_name }}" />
                    </fieldset>

                    <fieldset class="fieldset col-span-12">
                        <legend class="fieldset-legend">Apartments</legend>
                        <input type="number" class="input w-full" value="{{ $building->apartments_available }}"
                            name="apartments_available" />
                    </fieldset>
                </div>

                <button type="submit" class="btn btn-success mt-4">
                    <i class="fa-solid fa-arrows-rotate"></i> Update Building
                </button>
            </form>
        </div>
        <div class="col-span-12 page-header mt-4">
            <h1>Building Gallery</h1>
            <div class="image-gallery">
                <div class="image-item">
                    <div class="image-thumb">
                        @if (!Utilities::exists('buildings', $building->overviewImage->building_image ?? null))
                            <img src="{{ asset('img/placeholders/building-image-not-found.jpg') }}" alt="">
                        @else
                            <img src="{{ Utilities::url('buildings', $building->overviewImage->building_image ?? null) }}"
                                id="current-image-preview">
                        @endif
                    </div>
                    <div class="image-actions">
                        <h1>Overview</h1>
                        <button onclick="building_overview.showModal()">
                            <i class="fa-solid fa-arrows-rotate"></i> Change Image/Video
                        </button>
                    </div>
                </div>
                @foreach ($sectionGallery as $item)
                    @php
                        $section = $item['section'];
                        $image = $item['image'];
                        $imagePath = $image?->building_image;
                        $imageExists = Utilities::exists('buildings', $imagePath);
                    @endphp

                    <div class="image-item">
                        <div class="image-thumb">
                            @if ($imageExists)
                                <img src="{{ Utilities::url('buildings', $imagePath) }}" />
                            @else
                                <img src="{{ asset('img/placeholders/building-image-not-found.jpg') }}" />
                            @endif
                        </div>

                        <div class="image-actions">
                            <h1>{{ $section->section_name }}</h1>
                            <button data-building-id="{{ $building->id }}" data-section-id="{{ $section->id }}"
                                data-section-slug="{{ $section->section_slug }}"
                                data-image-url="{{ $imageExists ? Utilities::url('buildings', $imagePath) : '' }}"
                                data-gallery-id="{{ $image?->id }}" onclick="building_gallery.showModal()"
                                class="open-gallery-modal">
                                <i class="fa-solid fa-arrows-rotate"></i> Change Image/Video
                            </button>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection