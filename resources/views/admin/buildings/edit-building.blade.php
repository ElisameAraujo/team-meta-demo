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
        @include('components.admin.building-gallery')
        @include('components.admin.new-transition')
        <div class="col-span-12 page-header">
            <h1>Building Details</h1>
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
        <div class="col-span-12 page-header mt-4">
            <h1>Building Gallery</h1>
        </div>
        <div class="page-actions">
            <button class="btn btn-success" onclick="building_gallery.showModal()">
                <i class="fa-solid fa-plus"></i> New Item
            </button>
        </div>
        @if ($gallery->count() < 1)
            <div class="col-span-12 text-center">
                <p>No items in the gallery found for this building. Create one using the <strong>'New Item'</strong> button.
                </p>
            </div>
        @else
            <div class="col-span-12">
                <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Type</th>
                                <th>Video Path</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gallery as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ ucfirst($item->type) }}</td>
                                    <td>{{ $item->video_url_section }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                        <div class="join">
                                            <a href="{{-- {{ route('admin.buildings.edit-building', ['building' => $building->id]) }} --}}"
                                                class="btn btn-info btn-sm text-white join-item tooltip font-normal"
                                                data-tip="Edit">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <form action="{{-- {{ route('admin.buildings.delete-building', $building->id) }} --}}" method="POST">
                                                @csrf
                                                @method('DELETE')
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
        @endif

        <div class="col-span-12 page-header mt-4">
            <h1>Building Transitions</h1>
        </div>
        <div class="page-actions">
            <button class="btn btn-success" onclick="openTransitionModal(this)" data-type="{{ $building->building_slug }}">
                <i class="fa-solid fa-plus"></i> New Transition
            </button>
        </div>

        @if ($transitions->count() < 1)
            <div class="col-span-12 text-center">
                <p>No transitions found for this building. Create one using the <strong>'New Transition'</strong> button.
                </p>
            </div>
        @else
            <div class="col-span-12">
                <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Origin</th>
                                <th>Destination</th>
                                <th>Video Path</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transitions as $transition)
                                <tr>
                                    <td>{{ $transition->id }}</td>
                                    <td>{{ $transition->origin }}</td>
                                    <td>{{ $transition->destination }}</td>
                                    <td>{{ $transition->video_url }}</td>
                                    <td>{{ $transition->created_at }}</td>
                                    <td>{{ $transition->updated_at }}</td>
                                    <td>
                                        <div class="join">
                                            <a href="{{-- {{ route('admin.buildings.edit-building', ['building' => $building->id]) }} --}}"
                                                class="btn btn-info btn-sm text-white join-item tooltip font-normal"
                                                data-tip="Edit">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <form action="{{-- {{ route('admin.buildings.delete-building', $building->id) }} --}}" method="POST">
                                                @csrf
                                                @method('DELETE')
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
                {{ $transitions->links() }}
            </div>
        @endif
    </div>
    <script>
        function openTransitionModal(button) {
            const type = button.getAttribute('data-type');
            document.getElementById('type_transition').value = type;
            document.getElementById('new_transition').showModal();
        }
    </script>
@endsection
