@extends('layouts.web')
@section('title', 'Homepage')

@section('content')
    @include('components.web.navigation')
    @include('components.web.side-menu')
    <div class="page-background">
        <img src="{{ asset("img/background-example-overview.jpg") }}" alt="">
    </div>
@endsection