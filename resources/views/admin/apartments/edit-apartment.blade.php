@extends('layouts.admin')
@section('title', 'Edit Apartment')

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
                        <li><span>{{ $building->building_name }}</span></li>
                        <li>
                            <a href="{{ route('admin.buildings.apartments', ['building' => $building->id]) }}">
                                <i class="fa-solid fa-border-top-left"></i>Apartments
                            </a>
                        </li>
                        <li><span><i class="fa-solid fa-pen-to-square"></i>@yield('title')</span></li>
                        <li><span>{{ $apartment->unit_code }}</span></li>
                    </ul>
                </div>
            </h1>
        </div>
        <div class="page-header">
            <h1>Base Details</h1>
        </div>
        <div class="col-span-12 mb-4">
            @include('components.flash-messages')
            <form action="{{ route('admin.buildings.apartments.update-apartment', ['apartment' => $apartment->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid-default">

                    <fieldset class="fieldset col-span-6">
                        <legend class="fieldset-legend">Unit Code</legend>
                        <label class="input w-full">
                            <span class="label"><i class="fa-solid fa-barcode"></i></span>
                            <input type="text" name="unit_code" value="{{ old('unit_code', $apartment->unit_code) }}" />
                        </label>
                    </fieldset>

                    <fieldset class="fieldset col-span-6">
                        <legend class="fieldset-legend">Covered Area (m²)</legend>
                        <label class="input w-full">
                            <span class="label"><i class="fa-solid fa-ruler-combined"></i></span>
                            <input type="number" step="0.01" name="covered_area" value="{{ old('covered_area', $apartment->covered_area) }}" />
                        </label>
                    </fieldset>

                    <fieldset class="fieldset col-span-3">
                        <legend class="fieldset-legend">Ambients</legend>
                        <label class="input w-full">
                            <span class="label"><i class="fa-solid fa-bed"></i></span>
                            <input type="number" name="ambients" value="{{ old('ambients', $apartment->ambients) }}" />
                        </label>
                    </fieldset>

                    <fieldset class="fieldset col-span-3">
                        <legend class="fieldset-legend">Storage Size (m²)</legend>
                        <label class="input w-full">
                            <span class="label"><i class="fa-solid fa-warehouse"></i></span>
                            <input type="number" step="0.01" name="storage_size" value="{{ old('storage_size', $apartment->storage_size) }}" />
                        </label>
                    </fieldset>

                    <fieldset class="fieldset col-span-3">
                        <legend class="fieldset-legend">Floor</legend>
                        <label class="input w-full">
                            <span class="label"><i class="fa-solid fa-elevator"></i></span>
                            <input type="number" name="floor" value="{{ old('floor', $apartment->floor) }}" />
                        </label>
                    </fieldset>

                    <fieldset class="fieldset col-span-3">
                        <legend class="fieldset-legend">Price</legend>
                        <label class="input w-full">
                            <span class="label">US$</span>
                            <input type="number" step="0.01" name="price" value="{{ old('price', $apartment->price) }}" />
                        </label>
                    </fieldset>

                    <fieldset class="fieldset col-span-6">
                        <legend class="fieldset-legend">Unit Status</legend>
                        <select class="select w-full" name="apartment_status_id">
                            <option disabled selected>-- Select an Option --</option>
                            @foreach ($apartmentStatus as $status)
                                <option value="{{ $status->id }}" {{ $apartment->apartment_status_id == $status->id ? 'selected' : '' }}>
                                    {{ $status->status_name }}
                                </option>
                            @endforeach
                        </select>
                    </fieldset>

                    <fieldset class="fieldset col-span-6">
                        <legend class="fieldset-legend">Section</legend>
                        <select class="select w-full" name="section_id">
                            <option disabled selected>-- Select an Option --</option>
                            @foreach ($sections as $section)
                                <option value="{{ $section->id }}" {{ $apartment->section_id == $section->id ? 'selected' : '' }}>
                                    {{ $section->section_name }}
                                </option>
                            @endforeach
                        </select>
                    </fieldset>
                </div>

                <button class="btn btn-primary mt-2" type="submit">
                    <i class="fa-solid fa-arrows-rotate"></i>
                    Update Apartment
                </button>
            </form>
        </div>

        <div class="page-header">
            <h1>Floor Plan</h1>
        </div>
        @include('components.admin.floor-plan-apartment')
        <div class="col-span-12">
            <div class="image-gallery">

                <div class="image-item">
                    <div class="image-thumb">
                        <img src="{{ AssetHelper::assetURL('apartments', $apartment->floorPlan?->floor_plan_image, 'img/placeholders/building-image-not-found.jpg')}}" />
                    </div>

                    <div class="image-actions mt-4">
                        <button data-mode="update" data-target="floor_plan" data-image-url="{{ AssetHelper::assetURL('apartments', $apartment->floorPlan?->floor_plan_image) }}" data-gallery-id="{{ $apartment->floorPlan?->id }}" onclick="floor_plan.showModal()" class="open-gallery-modal">
                            <i class="fa-solid fa-arrows-rotate"></i> Change Image/Video
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection