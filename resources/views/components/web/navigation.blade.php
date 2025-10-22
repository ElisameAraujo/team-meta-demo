<div class="navigation">
    <h1 class="complex-name">
        @if (request()->is(''))
            <a href="{{ route('web.index') }}">
                <i class="fa-solid fa-arrow-left"></i> {{ $building->building_name }}
            </a>
        @elseif(request()->is('complex/section/*/overview') || request()->is('/'))
            {{ config('complex-config.complex-name') }}
        @endif
    </h1>
    {{-- <div class="buildings-pills">
        @foreach ($buildings as $building)
            <span class="building-pill">
                <a href="{{ route('web.building-overview', ['building' => $building->building_slug]) }}">
                    {{ $building->building_name }}
                </a>
            </span>
        @endforeach
    </div> --}}
    <div class="apartments-available">
        <span class="section {{ request()->is('/') ? 'active' : '' }}">
            <a href="{{ route('web.index') }}">
                Overview
            </a>
        </span>
        @foreach ($sections as $section)
            <span
                class="section {{ request()->is('complex/section/' . $section->section_slug . '/overview') ? 'active' : '' }}">
                <a href="{{ route('web.section-overview', ['section' => $section->section_slug]) }}"
                    onclick="sessionStorage.setItem('lastSide', '{{ $currentSide }}')">
                    {{ $section->section_name }}
                </a>
            </span>
        @endforeach
    </div>
</div>
