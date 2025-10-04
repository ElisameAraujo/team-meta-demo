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
        <div class="page-picture-update">
            <form action="{{ route('admin.buildings.update-building-image', $building->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="update-image-area">
                    <div class="current-image">
                        @if ($building->background == NULL || !File::exists('storage/buildings/' . $building->background))
                            <div class="p-8 no-image" id="current-image-preview">
                                Image Not Found
                            </div>
                        @else
                            <img src="{{ asset('storage/buildings/' . $building->background) }}" id="current-image-preview">
                        @endif
                    </div>

                    <div class="image-preview hidden">
                        <img id="preview">
                    </div>

                    <div class="change-current-image">
                        <button id="change-image" class="btn btn-primary w-full">
                            <i class="fa-solid fa-arrows-rotate"></i> Change Current Image/Video
                        </button>

                        <input type="file" name="background" id="background" data-label="update-image">
                    </div>

                    <div class="upload-new-image hidden">
                        <button type="submit" id="upload-image" class="btn btn-primary w-full">
                            <i class="fa-solid fa-cloud-arrow-up"></i> Update Image
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="page-forms">
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
    </div>
@endsection