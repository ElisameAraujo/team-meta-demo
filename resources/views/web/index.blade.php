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
        <svg class="interactive-building" viewBox="0 0 1920 1080" preserveAspectRatio="xMidYMid slice" id="front-overview">
            <g data-layer="building">
                <a xlink:href="https://virtualexperience.metaoriginal.com/icon_beach_tower/" target="_blank"
                    pointer-events="auto">
                    <path
                        d="M719.48 63.6c1.47,3.3 9.77,6.6 22.01,9.9l0.78 36.2 -23.57 4.03 0 18.23 -13.28 3.13c-0.46,3.46 3.24,6.78 12.5,9.89l1.03 111.99c-4.88,1.38 -9.5,2.29 -9.7,5.73 -0.27,4.78 5.25,6.11 11.32,7.49l4.55 174.93c-5.07,0.82 -9.48,3.37 -9.16,8.46 0.32,5.34 4.74,4.89 9.44,6.77l3.58 164.46c-5.68,1.86 -8.99,4.98 -8.98,9.64 0,4.81 4.21,7.87 10.93,9.89l3.13 152.74c-6.2,2.11 -8.7,5.67 -8.59,10.22 0.16,6.47 3.6,10.18 10.15,11.26l2.35 98.44 1.95 28.77 155.21 52.09c8.75,2.93 19.26,4.48 28.13,0l253.65 -128.13c2.51,-1.27 3.02,-3.74 3.06,-6.52l1.73 -115.5c7.13,-2.39 11.09,-5.29 10.71,-10.86 -0.32,-4.55 -4.5,-6.78 -8.86,-7.81l2.87 -145.58c6.31,-0.36 11.01,-2.52 11.72,-7.81 0.55,-4.21 -4.15,-7.13 -11.46,-9.11l3.91 -153.14c5.22,-1.78 10.43,-1.73 10.67,-8.07 0.13,-3.26 1.58,-4.3 -9.01,-6.82l3.52 -161.86c7.32,-1.07 10.61,-3.51 10.96,-8.4 0.16,-2.27 -4.85,-4.54 -11.98,-4.17l4.95 -105.2c6.39,-0.62 11.72,-3.21 10.67,-8.08 -0.75,-3.52 -4.93,-2.57 -8.85,-2.86l-0.78 -18.75 -42.45 -2.61 -1.04 -32.03c9.75,-1.26 18.12,-2.82 19.53,-7.03 1.13,-3.4 -6.61,-8.27 -15.24,-8.86l-142.58 -9.63c-16.45,-1.11 -32.88,0.62 -49.21,2.34l-235.17 24.9c-9.74,2.44 -15.44,4.89 -15.1,7.33z"
                        data-tooltip="true" data-label="Icon Beach Tower" />
                </a>
            </g>
            <g data-layer="apartments">

                <polygon points="741.29,148.55 805.87,153.37 805.62,175.12 740.69,169.86" class="available"
                    data-tooltip="true" data-label="Unit TC 001" data-status="Available" />
                <polygon points="807.05,204.67 871.16,211.42 870.91,233.17 806.44,225.98" class="sold" data-tooltip="true"
                    data-label="Unit TC 001" data-status="Sold" />
                <polygon points="741.39,220.91 806.44,227.19 806.19,248.94 740.79,242.21" class="reserved"
                    data-tooltip="true" data-label="Unit TC 001" data-status="Reserved" />
                <polygon points="768.53,326.95 822.78,333.39 821.61,353.1 767.97,346.38" class="available"
                    data-tooltip="true" data-label="Unit TC 001" data-status="Available" />
                <polygon points="824.52,381.75 873.57,387.58 874.12,410.41 823.91,403.05" class="reserved"
                    data-tooltip="true" data-label="Unit TC 001" data-status="Reserved" />
                <polygon points="781.55,398.83 823.91,403.05 823.69,425.14 780.99,418.57" class="sold" data-tooltip="true"
                    data-label="Unit TC 001" data-status="Sold" />
                <polygon points="823.69,425.14 873.57,434.46 872.67,456.39 822.47,448.57" class="available"
                    data-tooltip="true" data-label="Unit TC 001" data-status="Available" />
                <polygon points="757.53,513.36 813.57,523.05 812.65,543.66 756.7,533.84" class="reserved"
                    data-tooltip="true" data-label="Unit TC 001" data-status="Reserved" />
                <polygon points="987.97,199.69 1047.27,189.95 1046.78,213.91 988.5,223.91" class="sold"
                    data-tooltip="true" data-label="Unit TC 001" data-status="Sold" />
                <polygon points="1046.78,213.91 1046.06,236 1100.17,224.4 1100.25,204.37" class="available"
                    data-tooltip="true" data-label="Unit TC 001" data-status="Available" />
                <polygon points="988.75,248.13 1046.7,237.61 1046.4,258.06 989.27,270.27" class="sold" data-tooltip="true"
                    data-label="Unit TC 001" data-status="Sold" />
                <polygon points="1051.98,164.95 1100.73,158.03 1101.48,179.75 1052.5,186.83" class="available"
                    data-tooltip="true" data-label="Unit TC 001" data-status="Available" />
                <polygon points="1142.39,172.61 1197.76,164.07 1198.38,185.55 1142.66,195" class="sold"
                    data-tooltip="true" data-label="Unit TC 001" data-status="Sold" />
                <polygon points="988.98,302.01 1044.74,291.36 1045.26,312.71 988.72,324.02" class="reserved"
                    data-tooltip="true" data-label="Unit TC 001" data-status="Reserved" />
                <polygon points="1044.74,291.36 1098.51,279.12 1099.04,300.47 1045.26,312.71" class="available"
                    data-tooltip="true" data-label="Unit TC 001" data-status="Available" />
                <polygon points="1046.75,335.76 1098.45,324.79 1098.97,346.15 1046.49,357.76" class="sold"
                    data-tooltip="true" data-label="Unit TC 001" data-status="Sold" />
                <pathd="M988.86 397.1l0.25 19.88c-57.63,19.18 -88.72,24.66 -115.54,17.48l0.55 -24.05c32.16,9.7 82.95,-2.83 114.74,-13.31z"
                class="reserved" data-tooltip="true" data-label="Unit TC 001" data-status="Reserved" />
                <pathd="M987.11 351.15l0.6 21.11c-58.41,16.67 -87.32,22.51 -114.14,15.32l0.6 -22.02c35.28,9.05 56.1,-1.57 112.94,-14.41z"
                class="available" data-tooltip="true" data-label="Unit TC 001" data-status="Available" />
                <pathd="M987.17 278.74l0.78 23.52c-66.15,14.56 -88.28,15.65 -114.34,11.24l0.56 -20.44c32.81,9.14 78.02,-4.68 113,-14.32z"
                class="reserved" data-tooltip="true" data-label="Unit TC 001" data-status="Reserved" />
                <pathd="M988.3 176.68l-0.33 23.01c-57.26,12.21 -85.81,12.52 -114.4,8.51l0.6 -22.01c33.41,7.79 60.73,-1.05 114.13,-9.51z"
                class="available" data-tooltip="true" data-label="Unit TC 001" data-status="Available" />
                <polygon points="1047.24,380.11 1101.02,367.87 1101.54,389.22 1047.76,401.46" class="sold"
                    data-tooltip="true" data-label="Unit TC 001" data-status="Sold" />
                <polygon points="989.11,416.98 1042.89,404.74 1044.11,426.36 989.63,438.34" class="reserved"
                    data-tooltip="true" data-label="Unit TC 001" data-status="Reserved" />
                <polygon points="1044.11,426.36 1097.89,414.12 1098.41,435.47 1044.63,447.71" class="available"
                    data-tooltip="true" data-label="Unit TC 001" data-status="Available" />
                <polygon points="1142.39,217.18 1197.76,208.63 1198.38,230.12 1142.66,239.57" class="sold"
                    data-tooltip="true" data-label="Unit TC 001" data-status="Sold" />
                <polygon points="1139.94,267.49 1195.31,258.95 1195.93,280.43 1140.2,289.88" class="sold"
                    data-tooltip="true" data-label="Unit TC 001" data-status="Sold" />
                <polygon points="1139.35,313.43 1194.68,301.76 1195.31,323.24 1139.58,332.7" class="available"
                    data-tooltip="true" data-label="Unit TC 001" data-status="Available" />
                <polygon points="1139.35,357.8 1195.31,343.48 1195.62,364.65 1139.58,377.07" class="sold"
                    data-tooltip="true" data-label="Unit TC 001" data-status="Sold" />


            </g>
        </svg>

        <div id="apartment-tooltip" class="tooltip-card" style="display: none;"></div>
        <div class="video-overlay"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const fromKey = document.cookie.match(/fromKey=([^;]+)/)?.[1];
            const toKey = '{{ $currentSide }}';
            document.cookie = "fromKey=" + toKey + "; path=/";

            const video = document.getElementById('mainVideo');
            const source = document.getElementById('videoSource');
            const frontSVG = document.getElementById('front-overview');
            const currentSide = "{{ $currentSide }}";
            document.cookie = `fromKey=${currentSide}; path=/`;

            const showSVG = () => {
                if (currentSide === 'complex:front' && frontSVG) frontSVG.classList.add('show');
            };

            if (fromKey && fromKey !== toKey && source.src.includes('transitions')) {
                video.loop = false;
                video.onended = () => {
                    source.src = "{{ AssetHelper::assetURL('complex', $complexBackground) }}";
                    video.loop = true;
                    video.load();
                    video.play();
                    showSVG();
                };
            } else {
                video.loop = true;
                video.load();
                video.play();
                showSVG();
            }
        });
    </script>

@endsection
