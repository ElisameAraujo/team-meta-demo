@extends('layouts.web')
@section('title', $section->section_name)

@section('content')
    <div class="side-content">
        @include('components.web.navigation')
        @livewire('apartment-filter', [
            'apartments' => $apartments,
            'floors' => $floors,
            'ambients' => $ambients,
            'status' => $status
        ])
        </div>
        <img src="{{ AssetHelper::assetURL('complex', $pageImage->building_image)  }}" alt="">
@endsection