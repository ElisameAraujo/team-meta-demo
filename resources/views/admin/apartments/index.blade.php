@extends('layouts.admin')
@section('title', 'Apartments for ' . $building->building_name)

@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                @yield('title')
            </h1>
        </div>
        <div class="page-actions">
            <a class="btn btn-success"
                href="{{ route('admin.buildings.apartments.new-apartment', ['building' => $building->id]) }}">
                <i class="fa-solid fa-plus"></i>
                New Apartment
            </a>
        </div>
        <div class="col-span-12">
            <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Unit Code</th>
                            <th>Covered Area</th>
                            <th>Ambients</th>
                            <th>Storage Size</th>
                            <th>Floor</th>
                            <th>Section</th>
                            <th>Price</th>
                            <th>Unit Status</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($apartments as $apartment)
                            <tr>
                                <th>{{ $apartment->id }}</th>
                                <td>{{ $apartment->unit_code }}</td>
                                <td>{{ $apartment->formatted_covered_area }}</td>
                                <td>{{ $apartment->ambients }}</td>
                                <td>{{ $apartment->formatted_storage_size }}</td>
                                <td>{{ $apartment->floor }}</td>
                                <td>{{ $apartment->section->section_name }}</td>
                                <td>{{ $apartment->formatted_price }}</td>
                                <td>
                                    <div class="badge {{ $apartment->status->css_class }} text-white">
                                        {{ $apartment->status->status_name }}
                                    </div>
                                </td>
                                <td>{{ $apartment->formatted_created_at }}</td>
                                <td>{{ $apartment->formatted_updated_at }}</td>
                                <td>
                                    <div class="join">
                                        <a href="{{ route('admin.buildings.apartments.edit-apartment', ['building' => $building->id, 'apartment' => $apartment->id]) }}"
                                            class="btn btn-info btn-sm text-white join-item tooltip font-normal"
                                            data-tip="Edit">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <a href="{{-- {{ route('apartments.edit-coordinates', ['building' => $building->id, 'apartment' => $apartment->id]) }} --}}"
                                            class="btn btn-warning btn-sm text-white join-item tooltip font-normal"
                                            data-tip="Edit SVG Coordinates">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </a>

                                        <form action="{{-- {{ route('apartments.delete-apartment') }} --}}">
                                            <input type="hidden" name="id" value="{{ $apartment->id }}">
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

            {{ $apartments->links() }}
        </div>
    </div>
@endsection