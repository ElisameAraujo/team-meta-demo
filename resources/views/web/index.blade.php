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
                        d="M719.48 63.6c1.47,3.3 9.77,6.6 22.01,9.9l0.78 36.2 -23.57 4.03 0 18.23 -13.28 3.13c-0.46,3.46 3.24,6.78 12.5,9.89l1.03 111.99c-4.88,1.38 -9.5,2.29 -9.7,5.73 -0.27,4.78 5.25,6.11 11.32,7.49l4.55 174.93c-5.07,0.82 -9.48,3.37 -9.16,8.46 0.32,5.34 4.74,4.89 9.44,6.77l3.58 164.46c-5.68,1.86 -8.99,4.98 -8.98,9.64 0,4.81 4.21,7.87 10.93,9.89l3.13 152.74c-6.2,2.11 -8.7,5.67 -8.59,10.22 0.16,6.47 3.6,10.18 10.15,11.26l2.35 98.44 1.95 28.77 155.21 52.09c8.75,2.93 19.26,4.48 28.13,0l253.65 -128.13c2.51,-1.27 3.02,-3.74 3.06,-6.52l1.73 -115.5c7.13,-2.39 11.09,-5.29 10.71,-10.86 -0.32,-4.55 -4.5,-6.78 -8.86,-7.81l2.87 -145.58c6.31,-0.36 11.01,-2.52 11.72,-7.81 0.55,-4.21 -4.15,-7.13 -11.46,-9.11l3.91 -153.14c5.22,-1.78 10.43,-1.73 10.67,-8.07 0.13,-3.26 1.58,-4.3 -9.01,-6.82l3.52 -161.86c7.32,-1.07 10.61,-3.51 10.96,-8.4 0.16,-2.27 -4.85,-4.54 -11.98,-4.17l4.95 -105.2c6.39,-0.62 11.72,-3.21 10.67,-8.08 -0.75,-3.52 -4.93,-2.57 -8.85,-2.86l-0.78 -18.75 -42.45 -2.61 -1.04 -32.03c9.75,-1.26 18.12,-2.82 19.53,-7.03 1.13,-3.4 -6.61,-8.27 -15.24,-8.86l-142.58 -9.63c-16.45,-1.11 -32.88,0.62 -49.21,2.34l-235.17 24.9c-9.74,2.44 -15.44,4.89 -15.1,7.33z" />
                </a>
            </g>
            <g data-layer="apartments">

                <polygon points="741.29,148.55 770.87,150.87 770.62,172.62 740.69,169.86" data-tooltip="true"
                    data-label="Unit TC 405" data-status="Available" class="available" />
                <polygon points="807.57,154.93 844.96,157.77 844.71,179.52 806.96,176.24" data-tooltip="true"
                    data-label="Unit TC 430" data-status="Reserved" class="reserved" />
                <path
                    d="M872.67 162.22c18.85,2.78 37.08,2.94 54.71,-0.02l0.56 22.33c-16.34,1.56 -35.86,2.65 -55.87,-0.28l0.6 -22.03z"
                    data-tooltip="true" data-label="Unit TC 750" class="sold" data-status="Sold" />
                <polygon points="807.05,204.67 844.44,207.51 844.19,229.26 806.44,225.98" data-tooltip="true"
                    data-label="Unit TC 635" class="reserved" data-status="Reserved" />
                <polygon points="769.05,224.35 806.44,227.19 806.19,248.94 768.45,245.65" data-tooltip="true"
                    data-label="Unit TC 647" class="sold" data-status="Sold" />
                <polygon points="807.07,306.64 844.46,309.48 844.21,331.23 806.47,327.94" data-tooltip="true"
                    data-label="Unit TC 735" class="reserved" data-status="Reserved" />
                <polygon points="768.53,326.95 805.92,329.79 805.67,351.54 767.92,348.26" data-tooltip="true"
                    data-label="Unit TC 622" class="sold" data-status="Sold" />
                <polygon points="847.18,385.81 884.57,388.64 884.32,410.39 846.57,407.11" data-tooltip="true"
                    data-label="Unit TC 457" class="reserved" data-status="Reserved" />
                <polygon points="781.55,398.83 818.94,401.67 818.69,423.42 780.94,420.13" data-tooltip="true"
                    data-label="Unit TC 444" data-status="Available" class="available" />
                <polygon points="823.03,428.83 860.42,431.67 860.17,453.42 822.43,450.14" data-tooltip="true"
                    data-label="Unit TC 340" data-status="Available" class="available" />
                <path
                    d="M874.95 236.44c18.85,2.78 37.08,2.94 54.71,-0.02l0.56 22.33c-16.34,1.56 -35.86,2.65 -55.87,-0.28l0.6 -22.03z"
                    data-status="Available" class="available" data-tooltip="true" data-label="Unit TC 372" />
                <path
                    d="M873.39 317.17c18.84,2.78 37.08,2.94 54.71,-0.02l0.56 22.33c-16.34,1.56 -35.86,2.65 -55.87,-0.28l0.6 -22.03z"
                    data-status="Available" class="available" data-tooltip="true" data-label="Unit TC 337" />
                <path
                    d="M874.17 364.31c18.85,2.77 37.08,2.93 54.71,-0.03l0.56 22.34c-16.34,1.56 -35.86,2.64 -55.87,-0.29l0.6 -22.02z"
                    data-status="Available" class="available" data-tooltip="true" data-label="Unit TC 278" />
                <path
                    d="M874.17 436.18c18.85,2.78 37.08,2.94 54.71,-0.02l0.56 22.33c-16.34,1.56 -35.86,2.65 -55.87,-0.28l0.6 -22.03z"
                    data-status="Available" class="available" data-tooltip="true" data-label="Unit TC 330" />
                <polygon points="814.18,501.75 851.54,507.19 850.15,528.81 813.57,523.05" data-tooltip="true"
                    data-label="Unit TC 287" data-status="Available" class="available" />
                <polygon points="856.06,509.26 891.9,514.48 890.51,536.1 855.19,530.54" data-tooltip="true"
                    data-label="Unit TC 217"data-status="Available" class="available" />
                <polygon points="776.68,516.59 813.57,523.05 812.65,543.66 776.07,537.9" data-tooltip="true"
                    data-label="Unit TC 156"data-status="Available" class="available" />

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
