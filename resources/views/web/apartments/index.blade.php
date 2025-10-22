@extends('layouts.web')
@section('title', $apartment->unit_code)

@section('content')
    <div class="side-content">
        @include('components.web.apartment-navigation')
        @include('components.web.side-menu-apartment')
    </div>
    @if (!request()->headers->has('X-Reloaded'))
        <video id="transitionVideo" autoplay muted playsinline>
            <source src="{{ AssetHelper::assetURL('transitions', $transition->video_path) }}" type="video/mp4">
        </video>
    @endif

    <div class="video-background">
        <div id="apartmentBackground" class="fade-in-bg">
            <img src="{{ asset('videos/project/top.png') }}" alt="Apartment Floor Plan" />
        </div>

        <div class="video-overlay"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const transitionVideo = document.getElementById('transitionVideo');
            const apartmentBackground = document.getElementById('apartmentBackground');

            const isReload = performance.navigation.type === 1 || document.referrer === '';

            if (isReload && transitionVideo) {
                // Remove o vídeo imediatamente
                transitionVideo.remove();
                apartmentBackground.style.opacity = 1;
                return;
            }

            if (transitionVideo) {
                const fadeDuration = 1500;

                transitionVideo.addEventListener('timeupdate', () => {
                    const remaining = transitionVideo.duration - transitionVideo.currentTime;
                    if (remaining <= fadeDuration / 1000) {
                        apartmentBackground.style.opacity = 1;
                    }
                });

                transitionVideo.addEventListener('ended', () => {
                    transitionVideo.remove();
                    apartmentBackground.style.opacity = 1;
                });
            } else {
                apartmentBackground.style.opacity = 1;
            }
        });
    </script>
@endsection
