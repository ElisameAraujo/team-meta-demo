@extends('layouts.web')
@section('title', $section->section_name)

@section('content')
    @include('components.web.navigation')
    @include('components.web.side-menu')
    <div class="page-background">
        <img src="{{ AssetHelper::assetURL('complex', $pageImage->building_image)  }}" alt="">
    </div>
@endsection