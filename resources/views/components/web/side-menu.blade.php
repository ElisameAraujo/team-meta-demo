<div class="side-menu show">
    <div class="menu-context" id="menu-toggle">
        <span class="arrow-menu left-arrow"></span>
        <p id="menu-label">Hide</p>
    </div>
    <div class="side-menu-container">
        <div class="side-menu-header">
            <div class="filters" id="filters-toggle">
                Filters <i class="fa-solid fa-chevron-down" id="filters-icon"></i>
            </div>
            <div class="favorites">
                <i class="fa-regular fa-heart"></i> Favourites
                <input type="checkbox" checked="checked" class="toggle toggle-xs" />
            </div>
        </div>
        <div class="side-menu-filters" id="filters-panel">
            <div class="col-span-6">
                <h1>Square Meters</h1>
                <input type="range" min="0" max="100" value="40" class="range range-xs" />
            </div>
            <div class="col-span-6">
                <h1>Value</h1>
                <input type="range" min="0" max="100" value="40" class="range range-xs" />
            </div>
            <div class="col-span-6">
                <h1>Floor</h1>
                @foreach ($floors as $floor)
                    <span class="tag-alt">{{ $floor }}</span>
                @endforeach
            </div>
            <div class="col-span-6">
                <h1>Ambients</h1>
                @foreach ($ambients as $ambient)
                    <span class="tag-alt">{{ $ambient }}</span>
                @endforeach
            </div>
            <div class="col-span-6">
                <h1>Status</h1>
                @foreach ($status as $s)
                    <span class="tag-alt">{{ $s->status_name }}</span>
                @endforeach
            </div>
        </div>
        <div class="side-menu-content">
            <h1>
                <span class="content-header">
                    <p class="text-sm font-bold">Available</p> <span class="badge badge-xs bg-white">{{ $apartments->filter(fn($available) => $available->apartment_status_id === 1)->count() }}</span>
                    </p>
                </span>
                <span class="content-header">
                    <div class="dropdown dropdown-end">
                        <a tabindex="0" role="button" class="btn-open">
                            Order By: ID Ascendent <i class="fa-solid fa-chevron-down"></i>
                        </a>
                        <ul tabindex="0" class="dropdown-content menu rounded-box">
                            <li class="menu-header">Value</li>
                            <li><a>Min to Max</a></li>
                            <li class="last"><a>Max to Min</a></li>

                            <li class="menu-header">Size</li>
                            <li><a>Small to Large</a></li>
                            <li class="last"><a>Large to Small</a></li>

                            <li class="menu-header">ID</li>
                            <li><a>Ascendent</a></li>
                            <li><a>Descendent</a></li>
                        </ul>
                    </div>
                </span>
            </h1>
            <div class="apartments-list">
                @foreach ($apartments as $apartment)
                    <a href="{{ route('web.buildings.apartments.overview', ['building' => $apartment->building->building_slug, 'unit' => $apartment->unit_code]) }}">
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
                                    @if($apartment->apartment_status_id == 2)
                                        <p class="detail-value">
                                            <span class="tag">
                                                {{ $apartment->status->status_name }}
                                            </span>
                                        </p>
                                    @elseif ($apartment->apartment_status_id == 3)
                                        <p class="detail-value">
                                            <span class="tag">
                                                {{ $apartment->status->status_name }}
                                            </span>
                                        </p>
                                    @else
                                        <p class="detail-value">{{ $apartment->formatted_price }}</p>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>