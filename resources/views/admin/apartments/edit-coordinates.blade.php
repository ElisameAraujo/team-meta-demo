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

                    <fieldset class="fieldset col-span-12">
                        <legend class="fieldset-legend">Points</legend>
                        <label class="input w-full">
                            <span class="label"><i class="fa-solid fa-ellipsis"></i></span>
                            <input type="string" name="points" id="points"
                                value="{{ old('points', $apartment->coordinates?->points) }}" />
                        </label>
                    </fieldset>
                </div>

                <input type="hidden" name="apartment_id" value="{{ $apartment->id }}">
                <input type="hidden" name="type" id="coordinate_type">

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
                                    <ul tabIndex="0" class="menu bg-base-200 w-72 rounded-box dropdown-content z-[1]">
                                        <li>
                                            <details>
                                                <summary>
                                                    <i class="fa-solid fa-location-dot"></i> Create Object Using
                                                </summary>
                                                <ul>
                                                    <li>
                                                        <a data-tool="rectangle">
                                                            <i class="fa-solid fa-rectangle-xmark"></i>Rectangle
                                                            <kbd class="kbd kbd-sm">R</kbd>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a data-tool="polyline">
                                                            <i class="fa-solid fa-bezier-curve"></i>Line
                                                            <kbd class="kbd kbd-sm">L</kbd>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </details>
                                        </li>
                                        <li>
                                            <a data-tool="remove">
                                                <i class="fa-solid fa-trash-can"></i>
                                                Remove Selected Object <kbd class="kbd kbd-sm">Delete</kbd>
                                            </a>
                                        </li>

                                        <li>
                                            <a data-tool="clear">
                                                <i class="fa-solid fa-eraser"></i>
                                                Clear All Objects <kbd class="kbd kbd-sm">C</kbd>
                                            </a>
                                        </li>
                                        <form method="dialog">
                                            <li>
                                                <button href="#" class="cursor-pointer!">
                                                    <i class="fa-solid fa-xmark"></i>
                                                    Close Tool <kbd class="kbd kbd-sm">Esc</kbd>
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
                                    xlink:href="{{ AssetHelper::assetURL('buildings', $buildingBackground?->building_image, 'img/placeholders/building-image-not-found.jpg') }}" />

                                @if($apartment->coordinates->type === 'polygon')
                                    <polygon class="sold" points="{{$apartment->coordinates?->points}}" />
                                @else
                                    <rect class="sold" x="{{ $apartment->coordinates?->x_position }}"
                                        y="{{ $apartment->coordinates?->y_position }}"
                                        width="{{ $apartment->coordinates?->width }}"
                                        height="{{ $apartment->coordinates?->height }}" />
                                @endif
                            </g>
                        </svg>
                    </div>
                </div>
                <form method="dialog" class="modal-backdrop">
                    <button>close</button>
                </form>
                <div id="tool-toast-container"
                    class="toast toast-end fixed z-[9999] bottom-4 right-4 flex flex-col items-end gap-2 pointer-events-none">
                </div>
            </dialog>
        </div>
    </div>
@endsection