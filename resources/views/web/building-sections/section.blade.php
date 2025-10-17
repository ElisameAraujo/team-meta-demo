@extends('layouts.web')
@section('title', $building->building_name)

@section('content')
    <div class="side-content">
        @include('components.web.building-navigation')
        @livewire('apartment-filter', [
            'apartments' => $apartments,
            'floors' => $floors,
            'ambients' => $ambients,
            'status' => $status
        ])
        </div>
        <img src="{{ AssetHelper::assetURL('buildings', $sectionImage->building_image) }}" alt="">
@endsection