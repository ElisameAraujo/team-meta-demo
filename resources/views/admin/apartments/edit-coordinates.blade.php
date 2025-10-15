@extends('layouts.admin')
@section('title', 'Edit Coordinates')

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
        <button class="btn w-fit col-span-12 bg-black text-white hover:bg-black/75 transition-default"
            onclick="coordinates_modal.showModal()">
            <i class="fa-solid fa-map-location"></i>Apartment Coordinates Tool
        </button>
        <div class="col-span-12">
            @include('components.flash-messages')
            <form action="{{ route('admin.buildings.apartments.update-coordinates') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid-default">

                    <fieldset class="fieldset col-span-3">
                        <legend class="fieldset-legend">X Position</legend>
                        <label class="input w-full">
                            <span class="label"><i class="fa-solid fa-x"></i></span>
                            <input type="number" step="0.01" name="x_position" id="x_position"
                                value="{{ old('x_position', $apartment->coordinates?->x_position) }}" />
                        </label>
                    </fieldset>

                    <fieldset class="fieldset col-span-3">
                        <legend class="fieldset-legend">Y Position</legend>
                        <label class="input w-full">
                            <span class="label"><i class="fa-solid fa-y"></i></span>
                            <input type="number" step="0.01" name="y_position" id="y_position"
                                value="{{ old('y_position', $apartment->coordinates?->y_position) }}" />
                        </label>
                    </fieldset>

                    <fieldset class="fieldset col-span-3">
                        <legend class="fieldset-legend">Width</legend>
                        <label class="input w-full">
                            <span class="label"><i class="fa-solid fa-arrows-left-right"></i></span>
                            <input type="number" name="width" id="width" step="0.01"
                                value="{{ old('width', $apartment->coordinates?->width) }}" />
                        </label>
                    </fieldset>

                    <fieldset class="fieldset col-span-3">
                        <legend class="fieldset-legend">Height</legend>
                        <label class="input w-full">
                            <span class="label"><i class="fa-solid fa-arrows-up-down"></i></span>
                            <input type="number" step="0.01" name="height" id="height"
                                value="{{ old('height', $apartment->coordinates?->height) }}" />
                        </label>
                    </fieldset>
                </div>

                <input type="hidden" name="apartment_id" value="{{ $apartment->id }}">

                <button class="btn btn-primary mt-2" type="submit">
                    <i class="fa-solid fa-arrows-rotate"></i>
                    Update Coordinates
                </button>
            </form>

        </div>
        <div class="col-span-12">
            <dialog id="coordinates_modal" class="modal">
                <div class="modal-box">
                    <div class="coordinates-area">
                        <div class="interactive-draw">
                            <div class="toolbar">
                                <div class="dropdown">
                                    <label tabindex=0 class="btn glass-effect text-white rounded-md">
                                        Menu
                                    </label>
                                    <ul tabIndex="0" class="menu bg-base-200 w-64 rounded-box dropdown-content z-[1]">
                                        <li>
                                            <details>
                                                <summary>
                                                    <i class="fa-solid fa-location-dot"></i> Mark Coordinates Using
                                                </summary>
                                                <ul>
                                                    <li>
                                                        <a data-tool="rectangle">
                                                            <i class="fa-solid fa-rectangle-xmark"></i>Rectangle
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a data-tool="polyline">
                                                            <i class="fa-solid fa-bezier-curve"></i>Line
                                                        </a>
                                                    </li>
                                                </ul>
                                            </details>
                                        </li>
                                        <li>
                                            <a data-tool="remove">
                                                <i class="fa-solid fa-eraser"></i> Remove Coordinates
                                            </a>
                                        </li>
                                        <form method="dialog">
                                            <li>
                                                <button href="#" class="cursor-pointer!">
                                                    <i class="fa-solid fa-xmark"></i> Close Tool
                                                </button>
                                            </li>
                                        </form>
                                    </ul>
                                </div>
                            </div>
                            <canvas id="draw-area"></canvas>
                        </div>
                        <svg class="interactive-building" width="100%" height="100%" viewBox="0 0 1860 917">
                            <g>
                                <image x="0%" y="0%"
                                    xlink:href="{{ Utilities::assetURL('buildings', $buildingBackground->building_image) }}" />

                                <rect class="sold" x="{{ $apartment->coordinates?->x_position }}"
                                    y="{{ $apartment->coordinates?->y_position }}"
                                    width="{{ $apartment->coordinates?->width }}"
                                    height="{{ $apartment->coordinates?->height }}" data-label="Apartamento 301 (Sold)"
                                    data-tooltip="true" data-price="$85.000" data-area="96 m²" />
                            </g>
                        </svg>
                        <div id="apartment-tooltip" class="tooltip-card" style="display: none;">
                            <h3 id="tooltip-label" class="label-tooltip"></h3>
                            <span>Price: <p id="tooltip-price"></p></span>
                            <span>Area: <p id="tooltip-area"></p></span>
                        </div>
                        {{-- <img src="{{ Utilities::assetURL('buildings', $buildingBackground->building_image) }}" alt="">
                        --}}
                    </div>
                </div>
                <form method="dialog" class="modal-backdrop">
                    <button>close</button>
                </form>
            </dialog>
        </div>
    </div>
@endsection