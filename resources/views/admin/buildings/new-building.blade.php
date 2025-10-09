@extends('layouts.admin')
@section('title', 'New Building')

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
                        <li><span><i class="fa-solid fa-plus"></i>@yield('title')</span></li>
                    </ul>
                </div>
            </h1>
        </div>
        <div class="page-criar-item">
            <form action="{{ route('admin.buildings.save-building') }}" method="POST">
                @csrf

                <fieldset class="fieldset col-span-12">
                    <legend class="fieldset-legend">Building Name</legend>
                    <input type="text" class="input w-full" name="building_name" />
                </fieldset>

                <fieldset class="fieldset col-span-12">
                    <legend class="fieldset-legend">Apartments</legend>
                    <input type="number" class="input w-full" name="apartments_available" />
                </fieldset>

                <div class="col-span-12">
                    <button type="submit" class="btn btn-success mt-4 col-span-3">
                        <i class="fa-solid fa-floppy-disk"></i> Save Building
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection