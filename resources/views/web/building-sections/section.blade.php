@extends('layouts.web')
@section('title', $building->building_name)

@section('content')
    <div class="side-content">
        @include('components.web.building-navigation')
        @include('components.web.side-menu')
    </div>
    <img src="{{ AssetHelper::assetURL('buildings', $sectionImage->building_image) }}" alt="">
@endsection