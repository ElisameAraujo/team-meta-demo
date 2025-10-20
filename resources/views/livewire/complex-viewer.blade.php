<script>
    window.complexViewer = function() {
        return {
            init() {
                const fromKey = document.cookie.match(/fromKey=([^;]+)/)?.[1];
                const toKey = @json($currentSide);
                document.cookie = "fromKey=" + toKey + "; path=/";

                const video = document.getElementById('mainVideo');
                const source = document.getElementById('videoSource');

                const transitionPath = @json($transition ? AssetHelper::assetURL('transitions', $transition->video_path) : '');
                const loopPath = @json(
                    $sectionSlug
                        ? AssetHelper::assetURL('complex', $pageImage->building_image)
                        : AssetHelper::assetURL('complex', $complexBackground));

                if (fromKey && fromKey !== toKey && transitionPath) {
                    source.src = transitionPath;
                    video.loop = false;

                    video.addEventListener('ended', () => {
                        source.src = loopPath;
                        video.loop = true;
                        video.load();
                        video.play().catch(() => {});
                    });

                    video.addEventListener('loadedmetadata', () => {
                        video.play().catch(() => {});
                    }, {
                        once: true
                    });

                    video.load();
                } else {
                    source.src = loopPath;
                    video.loop = true;

                    video.addEventListener('loadedmetadata', () => {
                        video.play().catch(() => {});
                    }, {
                        once: true
                    });

                    video.load();
                }
            }
        };
    };
</script>

<div x-data="window.complexViewer()" x-init="init()" class="complex-wrapper">

    <div class="side-content">
        @include('components.web.navigation', [
            'buildings' => $buildings,
            'sections' => $sections,
            'currentSide' => $sectionSlug ? 'complex:' . $sectionSlug : 'complex:overview',
        ])

        @livewire('apartment-filter', [
            'apartments' => $apartments,
            'floors' => $floors,
            'ambients' => $ambients,
            'status' => $status,
        ])
    </div>
    <div class="video-background">
        <video id="mainVideo" autoplay muted playsinline controlsList="nodownload nofullscreen noremoteplay"
            disablePictureInPicture>
            <source id="videoSource"
                src="{{ $transition ? AssetHelper::assetURL('transitions', $transition->video_path) : $loopVideo }}"
                type="video/mp4">
        </video>
        <div class="video-overlay"></div>
    </div>

</div>
