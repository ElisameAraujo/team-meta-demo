@extends('layouts.admin')
@section('title', 'New Slide')

@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                @yield('title')
                <div class="breadcrumbs text-sm">
                    <ul>
                        <li>
                            <a href="{{ route('admin.home-configuration') }}">
                                <i class="fa-solid fa-house"></i>Home Configuration
                            </a>
                        </li>
                        <li><span><i class="fa-solid fa-images"></i>@yield('title')</span></li>
                    </ul>
                </div>
            </h1>
        </div>
        <div class="page-criar-item">
            <form action="" method="post">
                @csrf
                <div class="upload-imagem">
                    <div class="preview">
                        <div class="text" id="text">Preview</div>
                        <img id="file-preview">
                    </div>
                    <label for="imagemUpload" id="foto-label" class="btn btn-secondary">
                        <i class="fa-solid fa-cloud-arrow-up margem-icone"></i>
                        Select Image/Video Slide</label>
                    <input type="file" name="imagemUpload" id="imagemUpload">
                </div>

                <div class="formulario">

                    <fieldset class="fieldset col-span-12">
                        <legend class="fieldset-legend">Housing Complex Name</legend>
                        <input type="text" class="input w-full" name="housing_complex_name" />
                    </fieldset>

                    <fieldset class="fieldset col-span-12">
                        <label class="label">
                            <input type="checkbox" checked="checked" class="checkbox checkbox-xs rounded-sm" />
                            Start Slide
                        </label>
                    </fieldset>

                    <div class="col-span-12">
                        <button type="submit" class="btn btn-success mt-4 col-span-3">
                            <i class="fa-solid fa-floppy-disk"></i> Save Complex
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection