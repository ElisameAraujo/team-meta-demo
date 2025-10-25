@extends('layouts.admin')
@section('title', 'New Apartment')

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
                        <li><span><i class="fa-solid fa-plus"></i>@yield('title')</span></li>
                    </ul>
                </div>
            </h1>
        </div>
        <div class="col-span-12">
            <form action="{{ route('admin.buildings.apartments.save-apartment', ['building' => $building->id]) }}"
                method="POST">
                @csrf
                <div class="grid-default">
                    <fieldset class="fieldset col-span-12">
                        <legend class="fieldset-legend">Unit Code</legend>
                        <label class="input w-full">
                            <span class="label"><i class="fa-solid fa-barcode"></i></span>
                            <input type="text" name="unit_code" value="{{ old('unit_code') }}" />
                        </label>
                    </fieldset>

                    <fieldset class="fieldset col-span-2">
                        <legend class="fieldset-legend">Total Area (m²)</legend>
                        <label class="input w-full">
                            <span class="label"><i class="fa-solid fa-ruler-combined"></i></span>
                            <input type="number" step="0.01" name="total_area" value="{{ old('total_area') }}" />
                        </label>
                    </fieldset>

                    <fieldset class="fieldset col-span-2">
                        <legend class="fieldset-legend">Covered Area (m²)</legend>
                        <label class="input w-full">
                            <span class="label"><i class="fa-solid fa-ruler-combined"></i></span>
                            <input type="number" step="0.01" name="covered_area" value="{{ old('covered_area') }}" />
                        </label>
                    </fieldset>

                    <fieldset class="fieldset col-span-2">
                        <legend class="fieldset-legend">Semicovered Area (m²)</legend>
                        <label class="input w-full">
                            <span class="label"><i class="fa-solid fa-ruler-combined"></i></span>
                            <input type="number" step="0.01" name="semi_covered_area"
                                value="{{ old('semi_covered_area') }}" />
                        </label>
                    </fieldset>

                    <fieldset class="fieldset col-span-2">
                        <legend class="fieldset-legend">Uncovered Area (m²)</legend>
                        <label class="input w-full">
                            <span class="label"><i class="fa-solid fa-ruler-combined"></i></span>
                            <input type="number" step="0.01" name="uncovered_area"
                                value="{{ old('uncovered_area') }}" />
                        </label>
                    </fieldset>

                    <fieldset class="fieldset col-span-2">
                        <legend class="fieldset-legend">Common Area (m²)</legend>
                        <label class="input w-full">
                            <span class="label"><i class="fa-solid fa-ruler-combined"></i></span>
                            <input type="number" step="0.01" name="common_area" value="{{ old('common_area') }}" />
                        </label>
                    </fieldset>

                    <fieldset class="fieldset col-span-2">
                        <legend class="fieldset-legend">Storage Size (m²)</legend>
                        <label class="input w-full">
                            <span class="label"><i class="fa-solid fa-warehouse"></i></span>
                            <input type="number" step="0.01" name="storage_size" value="{{ old('storage_size') }}" />
                        </label>
                    </fieldset>

                    <fieldset class="fieldset col-span-4">
                        <legend class="fieldset-legend">Ambients</legend>
                        <label class="input w-full">
                            <span class="label"><i class="fa-solid fa-bed"></i></span>
                            <input type="number" name="ambients" value="{{ old('ambients') }}" />
                        </label>
                    </fieldset>

                    <fieldset class="fieldset col-span-4">
                        <legend class="fieldset-legend">Floor</legend>
                        <label class="input w-full">
                            <span class="label"><i class="fa-solid fa-elevator"></i></span>
                            <input type="number" name="floor" value="{{ old('floor') }}" />
                        </label>
                    </fieldset>

                    <fieldset class="fieldset col-span-4">
                        <legend class="fieldset-legend">Price</legend>
                        <label class="input w-full">
                            <span class="label">US$</span>
                            <input type="number" step="0.01" name="price" value="{{ old('price') }}" />
                        </label>
                    </fieldset>

                    <fieldset class="fieldset col-span-12">
                        <legend class="fieldset-legend">Unit Status</legend>
                        <select class="select w-full" name="apartment_status_id">
                            <option disabled selected>-- Select an Option --</option>
                            @foreach ($apartmentStatus as $status)
                                <option value="{{ $status->id }}"
                                    {{ old('apartment_status_id') == $status->id ? 'selected' : '' }}>
                                    {{ $status->status_name }}
                                </option>
                            @endforeach
                        </select>
                    </fieldset>

                </div>

                <button class="btn btn-primary mt-2" type="submit">
                    <i class="fa-solid fa-floppy-disk"></i> Save Apartment
                </button>
            </form>
        </div>
    </div>
@endsection
