<div class="navigation">
    <h1 class="complex-name">
        <a href="{{ route('web.index') }}">
            <i class="fa-solid fa-arrow-left"></i> {{ $building->building_name }}
        </a>
    </h1>
    <div class="buildings-pills">
        @foreach ($buildings as $b)
            <span
                class="building-pill {{ request()->is('building/' . $b->building_slug . '/overview') || request()->is('building/' . $b->building_slug . '/*') ? 'active' : '' }}">
                <a href="{{ route('web.building-overview', ['building' => $b->building_slug]) }}">
                    {{ $b->building_name }}
                </a>
            </span>
        @endforeach
    </div>
    <div class="apartments-available">
        @foreach ($sections as $section)
                <span
                    class="section {{ request()->is('building/' . $building->building_slug . '/section/' . $section->section_slug) ? 'active' : '' }}">
                    <a href="{{ route('web.building.section', [
                'building' => $building->building_slug,
                'section' => $section->section_slug
            ]) }}">{{ $section->section_name }}
                    </a>
                </span>
        @endforeach
    </div>
</div>