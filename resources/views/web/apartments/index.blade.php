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
            <svg class="interactive-building" width="100%" height="100%" viewBox="0 0 1866 917"
                preserveAspectRatio="xMinYMin meet">
                <g transform="translate(0, -50)">
                    <image x="0%" y="0%"
                        xlink:href="{{ AssetHelper::assetURL('apartments', $apartment->floorPlan->floor_plan_image) }}" />
                    <a xlink:href="https://virtualexperience.metaoriginal.com/icon_beach_residence_05/" target="_blank">
                        <polygon points="1224,979 1224,577 893,577 893,979" data-label="Apartament 05"
                            data-tooltip="true" />
                    </a>
                    <a xlink:href="https://virtualexperience.metaoriginal.com/icon_beach_residence_10" target="_blank">
                        <path
                            d="M1869 599.79l-212.43 -1.05 0 -37.5 -8.79 0 0 -45.43 -56.06 0 0 -8.27 -45.71 0 0 -103.5 -102.87 0 0 -343.21 258.59 -0.52c54.89,-0.11 93.2,32.73 99.21,73.83l68.06 465.65z"
                            data-label="Apartament 10" data-tooltip="true" />
                    </a>
                    <a xlink:href="https://virtualexperience.metaoriginal.com/icon_beach_residence_08/" htarget="_blank">
                        <path
                            d="M1443.14 287.64l-17.72 0 0 112.76 -91.41 0 0 109.38 -50.26 0 0 -104.69c-63.2,0 -126.39,0 -189.59,0l0 -344.26 348.98 0 0 226.81z"
                            data-label="Apartament 08" data-tooltip="true" />
                    </a>
                </g>
            </svg>
        </div>

        <div id="apartment-tooltip" class="tooltip-card" style="display: none;"></div>

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
