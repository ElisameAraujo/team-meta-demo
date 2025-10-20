@extends('layouts.web')
@section('title', $building->building_name)

@section('content')
    <div class="side-content">
        @include('components.web.building-navigation')
        @livewire('apartment-filter', ['apartments' => $apartments, 'floors' => $floors, 'ambients' => $ambients, 'status' => $status])
    </div>

    <div class="video-background">
        <video id="mainVideo" autoplay muted playsinline controlsList="nodownload nofullscreen noremoteplay"
            disablePictureInPicture>
            <source id="videoSource"
                src="{{ $transition ? AssetHelper::assetURL('transitions', $transition->video_path) : AssetHelper::assetURL('buildings', $sectionImage->building_image) }}"
                type="video/mp4">
        </video>
        <div class="video-overlay"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.cookie = "fromKey={{ $currentSide }}; path=/";

            const transitionPath =
                "{{ $transition ? AssetHelper::assetURL('transitions', $transition->video_path) : '' }}";
            const loopPath = "{{ AssetHelper::assetURL('buildings', $sectionImage->building_image) }}";

            const video = document.getElementById('mainVideo');
            const source = document.getElementById('videoSource');

            if (!transitionPath) {
                video.loop = true;
                video.load();
                video.play();
                return;
            }

            video.loop = false;
            video.addEventListener('ended', () => {
                source.src = loopPath;
                video.load();
                video.loop = true;
                video.play();
            });

            video.load();
            video.play();
        });
    </script>
@endsection
