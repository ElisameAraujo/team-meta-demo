@extends('layouts.admin')
@section('title', 'Buildings')

@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                @yield('title')
            </h1>
        </div>
        <div class="page-actions">
            <a class="btn btn-success" href="{{ route('admin.buildings.new-building') }}">
                <i class="fa-solid fa-plus"></i>
                New Building
            </a>
        </div>
        <div class="col-span-12">
            <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Building Name</th>
                            <th>Slide File</th>
                            <th>Slug</th>
                            <th>Apartments</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($buildings as $building)
                            <tr>
                                <th>{{ $building->id }}</th>
                                <td>{{ $building->building_name }}</td>
                                <td>{{ $building->background }}</td>
                                <td>{{ $building->building_slug }}</td>
                                <td>{{ $building->apartments_available }}</td>
                                <td>{{ $building->formatted_created_at }}</td>
                                <td>{{ $building->formatted_updated_at }}</td>
                                <td>
                                    <div class="join">
                                        <a href="{{ route('admin.buildings.edit-building', ['building' => $building->id]) }}"
                                            class="btn btn-info btn-sm text-white join-item tooltip font-normal"
                                            data-tip="Edit">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="{{ route('admin.buildings.apartments', ['building' => $building->id]) }}"
                                            class="btn btn-success btn-sm text-white join-item tooltip font-normal"
                                            data-tip="Apartments">
                                            <i class="fa-solid fa-border-top-left"></i>
                                        </a>
                                        <form action="{{-- {{ route('apartments.delete-apartment') }} --}}">
                                            <input type="hidden" name="id" value="{{ $building->id }}">
                                            <button type="submit"
                                                class="btn btn-error btn-sm text-white join-item tooltip font-normal"
                                                data-tip="Remove">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection