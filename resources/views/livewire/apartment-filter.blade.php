<div class="side-menu {{ $sideMenuOpen ? 'show' : 'hide' }}">
    <div class="menu-context" wire:click="toggleSideMenu">
        <span class="arrow-menu {{ $sideMenuOpen ? 'left-arrow' : 'right-arrow' }}"></span>
        <p id="menu-label">{{ $sideMenuOpen ? 'Hide' : 'Show' }}</p>
    </div>

    <div class="side-menu-container">
        <div class="side-menu-header">
            <div class="filters" wire:click="toggleFilters">
                Filters
                @if ($this->activeFiltersCount > 0)
                    <span class="badge badge-xs bg-white ml-0.5">{{ $this->activeFiltersCount }}</span>
                @endif
                <i class="fa-solid fa-chevron-down {{ $filtersOpen ? 'rotate-180' : '' }}"></i>
            </div>

            {{-- <div class="favorites">
                <i class="fa-regular fa-heart"></i> Favourites
                <input type="checkbox" wire:model="favoritesOnly" class="toggle toggle-xs" />
            </div> --}}
        </div>

        <div class="side-menu-filters {{ $filtersOpen ? 'open' : '' }}" id="filters-panel">
            <div class="col-span-6">
                <h1>Floor</h1>
                @foreach ($floors as $floor)
                    <span class="tag-alt {{ $selectedFloor == $floor ? 'active' : '' }}"
                        wire:click="$set('selectedFloor', '{{ $selectedFloor == $floor ? '' : $floor }}')">
                        {{ $floor }}</span>
                @endforeach
            </div>

            <div class="col-span-6">
                <h1>Ambients</h1>
                @foreach ($ambients as $ambient)
                    <span class="tag-alt {{ $selectedAmbient == $ambient ? 'active' : '' }}"
                        wire:click="$set('selectedAmbient', '{{ $selectedAmbient == $ambient ? '' : $ambient }}')">{{ $ambient }}</span>
                @endforeach
            </div>

            <div class="col-span-6">
                <h1>Status</h1>
                @foreach ($status as $s)
                    <span class="tag-alt {{ $selectedStatus == $s->id ? 'active' : '' }}"
                        wire:click="$set('selectedStatus', '{{ $selectedStatus == $s->id ? '' : $s->id }}')">{{ $s->status_name }}</span>
                @endforeach
            </div>
        </div>

        <div class="side-menu-content">
            <h1>
                <span class="content-header">
                    <p class="text-sm font-bold">Available</p>
                    <span
                        class="badge badge-xs bg-white">{{ $filteredApartments->where('apartment_status_id', 1)->count() }}</span>
                </span>

                <span class="content-header">
                    <div class="dropdown dropdown-end">
                        <a tabindex="0" role="button" class="btn-open">
                            Order By: {{ ucfirst(str_replace('_', ' ', $orderBy)) }} <i
                                class="fa-solid fa-chevron-down"></i>
                        </a>
                        <ul tabindex="0" class="dropdown-content menu rounded-box">
                            <li class="menu-header">Value</li>
                            <li><a wire:click="$set('orderBy', 'value_asc')">Min to Max</a></li>
                            <li><a wire:click="$set('orderBy', 'value_desc')">Max to Min</a></li>

                            <li class="menu-header">Size</li>
                            <li><a wire:click="$set('orderBy', 'size_asc')">Small to Large</a></li>
                            <li><a wire:click="$set('orderBy', 'size_desc')">Large to Small</a></li>

                            <li class="menu-header">ID</li>
                            <li><a wire:click="$set('orderBy', 'id_asc')">Ascendent</a></li>
                            <li><a wire:click="$set('orderBy', 'id_desc')">Descendent</a></li>
                        </ul>
                    </div>
                </span>
            </h1>

            <div class="apartments-list">
                @if ($filteredApartments->count() < 1)
                    <div class="apartment-item-no-results">No results found for this filter combination.</div>
                @else
                    @foreach ($filteredApartments as $apartment)
                        <a
                            href="{{ route('web.buildings.apartments.overview', ['building' => $apartment->building->building_slug, 'unit' => $apartment->unit_code]) }}">
                            <div class="apartment-item">
                                <div class="details">
                                    <div class="detail-item">
                                        <p class="detail-label">Unit</p>
                                        <p class="detail-value">{{ $apartment->unit_code }}</p>
                                    </div>
                                    <div class="detail-item">
                                        <p class="detail-label">Cov. Area</p>
                                        <p class="detail-value">{{ $apartment->formatted_covered_area }}</p>
                                    </div>
                                    <div class="detail-item">
                                        <p class="detail-label">Floor</p>
                                        <p class="detail-value">{{ $apartment->floor }}</p>
                                    </div>
                                    <div class="detail-item">
                                        <p class="detail-label">Ambients</p>
                                        <p class="detail-value">{{ $apartment->ambients }}</p>
                                    </div>
                                    <div class="detail-item">
                                        <p class="detail-label">Storage</p>
                                        <p class="detail-value">{{ $apartment->formatted_storage_size }}</p>
                                    </div>
                                    <div class="detail-item">
                                        <p class="detail-label">Value</p>
                                        @if ($apartment->apartment_status_id != 1)
                                            <p class="detail-value">
                                                <span class="tag">{{ $apartment->status->status_name }}</span>
                                            </p>
                                        @else
                                            <p class="detail-value">{{ $apartment->formatted_price }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
