@extends('layouts.web')
@section('title', $section->section_name)

@section('content')
    <div class="side-content">
        @include('components.web.navigation')
        @livewire('apartment-filter', ['apartments' => $apartments, 'floors' => $floors, 'ambients' => $ambients, 'status' => $status])
    </div>

    <div class="video-background">
        <video id="mainVideo" autoplay muted playsinline controlsList="nodownload nofullscreen noremoteplay"
            disablePictureInPicture>
            <source id="videoSource"
                src="{{ $transition ? AssetHelper::assetURL('transitions', $transition->video_path) : AssetHelper::assetURL('complex', $pageImage->building_image) }}"
                type="video/mp4">
        </video>
        @include('components.web.svgs')

        <div class="video-overlay"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const transitionPath =
                "{{ $transition ? AssetHelper::assetURL('transitions', $transition->video_path) : '' }}";
            const loopPath = "{{ AssetHelper::assetURL('complex', $pageImage->building_image) }}";

            const video = document.getElementById('mainVideo');
            const source = document.getElementById('videoSource');

            const frontSVG = document.getElementById('front-overview');
            const backSVG = document.getElementById('back-overview');

            const currentSide = "{{ $currentSide }}";
            document.cookie = `fromKey=${currentSide}; path=/`;

            const showSVG = () => {
                if (currentSide === 'complex:front' && frontSVG) frontSVG.classList.add('show');
                if (currentSide === 'complex:back' && backSVG) backSVG.classList.add('show');
            };

            if (!transitionPath) {
                video.loop = true;
                video.load();
                video.play();
                showSVG();
                return;
            }

            video.loop = false;
            video.addEventListener('ended', () => {
                source.src = loopPath;
                video.load();
                video.loop = true;
                video.play();
                showSVG();
            });

            video.load();
            video.play();
        });
    </script>
@endsection
