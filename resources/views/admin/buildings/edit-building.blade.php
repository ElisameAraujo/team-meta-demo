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
        <div class="page-picture-update">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="upload-foto">
                    <!-- Imagem Atual -->
                    <div class="foto-atual" id="foto-atual">
                        <img src="{{ asset('img/temp/kanye-west-1.jpg') }}" alt="">
                    </div>
                    <!-- Atualiza Imagem -->
                    <div class="preview hidden" id="preview">
                        <div class="text" id="text">Preview</div>
                        <img id="file-preview">
                    </div>

                    <label for="imagemUpload" id="foto-label" class="btn btn-primary w-full">
                        <i class="fa-solid fa-cloud-arrow-up"></i> Change Building Image/Video
                    </label>

                    <input type="file" name="imagemUpload" id="imagemUpload" class="form-control">

                    <button type="submit" class="btn btn-primary w-full hidden" id="enviar">
                        <i class="fa-solid fa-arrows-rotate"></i> Update Building Image/Video
                    </button>
                </div>
            </form>
        </div>
        <div class="page-forms">
            <form action="" method="POST">
                @csrf
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

                <input type="hidden" name="id" value="{{ $building->id }}">

                <button type="submit" class="btn btn-success mt-4">
                    <i class="fa-solid fa-arrows-rotate"></i> Update Building
                </button>
            </form>
        </div>
    </div>
@endsection