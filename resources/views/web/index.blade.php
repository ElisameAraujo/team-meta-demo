@extends('layouts.web')
@section('title', 'Homepage')

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
        <img src="{{ AssetHelper::assetURL('complex', $complexBackground) }}" alt="">
@endsection