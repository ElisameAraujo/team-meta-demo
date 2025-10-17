@extends('layouts.web')
@section('title', 'Homepage')

@section('content')
    <div class="side-content">
        @include('components.web.navigation')
        @include('components.web.side-menu')
    </div>
    <img src="{{ AssetHelper::assetURL('complex', $complexBackground) }}" alt="">
@endsection