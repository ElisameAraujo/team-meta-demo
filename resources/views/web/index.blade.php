@extends('layouts.web')
@section('title', 'Homepage')

@section('content')
    <div class="side-content">
        @include('components.web.navigation')
        @livewire('apartment-filter', ['apartments' => $apartments, 'floors' => $floors, 'ambients' => $ambients, 'status' => $status])
    </div>

    <div class="video-background">
        <video id="mainVideo" autoplay muted playsinline controlsList="nodownload nofullscreen noremoteplay"
            disablePictureInPicture>
            <source id="videoSource"
                src="{{ $transition ? AssetHelper::assetURL('transitions', $transition->video_path) : AssetHelper::assetURL('complex', $complexBackground) }}"
                type="video/mp4">
        </video>

        <div class="video-overlay"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const fromKey = document.cookie.match(/fromKey=([^;]+)/)?.[1];
            const toKey = '{{ $currentSide }}';
            document.cookie = "fromKey=" + toKey + "; path=/";

            const video = document.getElementById('mainVideo');
            const source = document.getElementById('videoSource');

            if (fromKey && fromKey !== toKey && source.src.includes('transitions')) {
                video.loop = false;
                video.onended = () => {
                    source.src = "{{ AssetHelper::assetURL('complex', $complexBackground) }}";
                    video.loop = true;
                    video.load();
                    video.play();
                };
            } else {
                video.loop = true;
                video.load();
                video.play();
            }
        });
    </script>

@endsection
