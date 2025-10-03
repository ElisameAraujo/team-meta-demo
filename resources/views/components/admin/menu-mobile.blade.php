<nav class="mobile-navigation" id="nav-mobile">
    <div class="mobile-backdrop"></div>
    <div class="menu-navigation">
        <div class="close-button">
            <button id="close-menu">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="mobile-header">
            <div class="profile-menu">
                <button popovertarget="profile-mobile" style="anchor-name:--profile-mobile" class="button-profile">
                    <img src="https://img.freepik.com/free-photo/portrait-father-his-backyard_23-2149489567.jpg"
                        alt="avatar" />
                    <div class="profile">
                        <span class="username">Elisame Araújo</span>
                        <p class="email">elisamearaujo@gmail.com</p>
                    </div>
                </button>
                <ul class="dropdown menu w-71 rounded-box bg-base-100 shadow-sm" popover id="profile-mobile"
                    style="position-anchor:--profile-mobile">
                    <li class="menu-item">
                        <a href="{{-- {{ route('admin.conta.index') }} --}}">
                            <i class="fa-solid fa-user"></i> My Profile
                        </a>
                    </li>
                    <li>
                        <a href="{{-- {{ route('admin.conta.seguranca') }} --}}">
                            <i class="fa-solid fa-fingerprint"></i> Security
                        </a>
                    </li>
                    <li>
                        <a>
                            <i class="fa-solid fa-arrow-right-from-bracket"></i> Sair
                        </a>
                    </li>
                </ul>
            </div>

            <div class="go-to-site">
                <a href="{{ config('app.url') }}" target="_blank">
                    Visit Website
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </a>
            </div>

        </div>
        <ul class="menu-list">
            <li class="menu-item  {{ request()->is('admin') ? 'active' : '' }}">
                <a href="{{-- {{ route('admin.dashboard') }} --}}">
                    <i class="fa-solid fa-house"></i>
                    <span>Home Configuration</span>
                </a>
            </li>

            <li class="menu-item {{ request()->is('admin/buildings') ? 'active' : '' }}">
                <a href="{{-- {{ route('admin.dashboard') }} --}}">
                    <i class="fa-solid fa-building"></i>
                    <span>Buildings</span>
                </a>
            </li>

            <li class="menu-item {{ request()->is('admin/apartments') ? 'active' : '' }}">
                <a href="{{-- {{ route('admin.dashboard') }} --}}">
                    <i class="fa-solid fa-border-top-left"></i>
                    <span>Apartments</span>
                </a>
            </li>
        </ul>
    </div>
</nav>