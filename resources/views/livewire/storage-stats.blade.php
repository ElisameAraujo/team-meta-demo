<div class="storage-info">
    @foreach ($stats as $stat)
        <div class="info-data">
            <div class="stats shadow">
                <div class="stat">
                    <div class="stat-title">{{ $stat['title'] }}</div>
                    <div class="stat-value">{{ $stat['value'] }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>
