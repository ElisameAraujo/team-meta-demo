@extends('layouts.web')
@section('title', $building->building_name)

@section('content')
    @include('components.web.building-navigation')
    @include('components.web.side-menu')
    <div class="page-background">
        <img src="{{ Utilities::assetURL('buildings', $overviewBackground) }}" alt="">
    </div>
@endsection