<div class="side-menu show">
    <div class="menu-context" id="menu-toggle">
        <span class="arrow-menu left-arrow"></span>
        <p id="menu-label">Hide</p>
    </div>
    <div class="side-menu-container">
        <div class="apartment-container">
            <div class="apartment-header">
                <h1>Details of Unit</h1>
                @if($apartment->apartment_status_id !== 1)
                @else
                    <div class="actions">
                        <span class="tooltip" data-tip="Copy Link">
                            <i class="fa-regular fa-copy"></i>
                        </span>
                        <span class="tooltip" data-tip="Favorite">
                            <i class="fa-regular fa-heart"></i>
                        </span>
                    </div>
                @endif
            </div>
            <div class="apartment-details">
                <div class="details">
                    <div class="detail-item">
                        <p class="detail-label">Unit</p>
                        <p class="detail-value">{{ $apartment->unit_code }}</p>
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
                        <p class="detail-value">{{ $apartment->formatted_price }}</p>
                    </div>
                </div>
            </div>
            <div class="apartment-ambients-sizes">
                <div class="ambients-columns">
                    <div class="ambient-column gap-0!">
                        <span class="title">Total Area</span>
                        <span class="size">134,23 m²</span>
                    </div>
                    <div class="ambient-column">
                        <div class="size-area">
                            <span class="title">Covered Area</span>
                            <span class="size">69,97 m²</span>
                        </div>
                        <div class="size-area">
                            <span class="title">Uncovered Area</span>
                            <span class="size">38,35 m²</span>
                        </div>
                        <div class="size-area">
                            <span class="title">Storage Size</span>
                            <span class="size">3,18 m²</span>
                        </div>
                    </div>
                    <div class="ambient-column">
                        <div class="size-area">
                            <span class="title">Semi-Covered Area</span>
                            <span class="size">22,91 m²</span>
                        </div>
                        <div class="size-area">
                            <span class="title">Common Area</span>
                            <span class="size">33,57 m²</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="apartment-actions">
                <div class="documentation">
                    <span class="title">Documentation</span>
                    <span class="download"><i class="fa-solid fa-download"></i> Download</span>
                </div>

                <div class="apartment-action">
                    @if ($apartment->apartment_status_id == 1)
                        <button><i class="fa-regular fa-bookmark"></i> Book Unit</button>
                    @else
                        <span class="not-available">{{ $apartment->status->status_name }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>