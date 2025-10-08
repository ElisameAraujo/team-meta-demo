@extends('layouts.web')
@section('title', $building->building_name)

@section('content')
    @include('components.web.building-navigation')
    @include('components.web.side-menu')
    <div class="page-background">
        <img src="{{ asset('img/background-example-overview.jpg') }}" alt="">
    </div>
@endsection