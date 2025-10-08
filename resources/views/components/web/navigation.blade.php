<div class="navigation">
    <h1 class="complex-name">
        @if (!request()->is('/'))
            <a href="{{ route('web.index') }}">
                <i class="fa-solid fa-arrow-left"></i> {{ $building->building_name }}
            </a>
        @else
            {{ config('complex-config.complex-name') }}
        @endif
    </h1>
    <div class="buildings-pills">
        @foreach ($buildings as $building)
            <span class="building-pill">
                <a href="{{ route('web.building-overview', ['building' => $building->building_slug]) }}">
                    {{ $building->building_name }}
                </a>
            </span>
        @endforeach
    </div>
    <div class="apartments-available">
        @foreach ($sections as $section)
            <span class="section">
                <a href="{{ route('web.section-overview', ['section' => $section->section_slug]) }}">{{ $section->section_name }}
                </a>
            </span>
        @endforeach
    </div>
</div>