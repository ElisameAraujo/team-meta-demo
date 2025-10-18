@extends('layouts.web')
@section('title', 'Homepage')

@section('content')
    <div class="side-content">
        @include('components.web.navigation')
        @livewire('apartment-filter', ['apartments' => $apartments, 'floors' => $floors, 'ambients' => $ambients, 'status' => $status])
    </div>

    <div class="video-background">
        <video autoplay muted loop playsinline controlsList="nodownload nofullscreen noremoteplay" disablePictureInPicture>
            <source src="{{ AssetHelper::assetURL('complex', $complexBackground) }}" type="video/mp4">
        </video>
        <div class="video-overlay"></div>
    </div>

@endsection