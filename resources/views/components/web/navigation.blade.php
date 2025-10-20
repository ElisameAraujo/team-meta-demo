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
        <span class="section {{ $currentSide === 'complex:overview' ? 'active' : '' }}">
            <button wire:click="changeSection(null)">
                Overview
            </button>
        </span>
        @foreach ($sections as $section)
            <span class="section {{ $currentSide === 'complex:' . $section->section_slug ? 'active' : '' }}">
                <button wire:click="changeSection('{{ $section->section_slug }}')">
                    {{ $section->section_name }}
                </button>
            </span>
        @endforeach
    </div>
</div>
