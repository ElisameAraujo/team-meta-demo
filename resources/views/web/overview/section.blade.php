@extends('layouts.web')
@section('title', $section->section_name)

@section('content')
    <div class="side-content">
        @include('components.web.navigation')
        @include('components.web.side-menu')
    </div>
    <img src="{{ AssetHelper::assetURL('complex', $pageImage->building_image)  }}" alt="">
@endsection