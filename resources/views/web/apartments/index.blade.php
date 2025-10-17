@extends('layouts.web')
@section('title', $apartment->unit_code)

@section('content')
    <div class="side-content">
        @include('components.web.apartment-navigation')
        @include('components.web.side-menu-apartment')
    </div>
    <img src="{{ AssetHelper::assetURL('apartments', $apartment->floorplan?->floor_plan_image, 'img/placeholders/building-image-not-found.jpg') }}" alt="">
@endsection