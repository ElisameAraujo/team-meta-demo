<aside>
    <div class="sticky-menu">
        <div class="sticky-menu-header">
            <div class="profile-menu">
                <button popovertarget="profile-menu" style="anchor-name:--profile-menu">
                    <img src="https://img.freepik.com/free-photo/portrait-father-his-backyard_23-2149489567.jpg"
                        alt="avatar" />
                    <div class="profile">
                        <span class="username">John Doe</span>
                        <p class="email">johndoe@gmail.com</p>
                    </div>
                </button>
                <ul class="dropdown menu w-71 rounded-box bg-base-100 shadow-sm" popover id="profile-menu"
                    style="position-anchor:--profile-menu">
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
                            <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
            <div class="go-to-website">
                <a href="{{ config('app.url') }}" target="_blank">
                    Visit Website
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </a>
            </div>
        </div>
        <nav>
            <ul class="menu-list">
                <li class="menu-item {{ request()->is('admin') || request()->is('admin/new-slide') ? 'active' : '' }}">
                    <a href="{{ route('admin.complex-configuration') }}">
                        <i class="fa-solid fa-city"></i>
                        <span>Complex Configuration</span>
                    </a>
                </li>

                <li
                    class="menu-item {{ request()->is('admin/buildings') || request()->is('admin/buildings/*') ? 'active' : '' }}">
                    <a href="{{ route('admin.buildings') }}">
                        <i class="fa-solid fa-building"></i>
                        <span>Buildings</span>
                    </a>
                </li>

                <li
                    class="menu-item {{ request()->is('admin/file-manager') || request()->is('admin/file-manager/*') ? 'active' : '' }}">
                    <a href="{{ route('admin.file-manager') }}">
                        <i class="fa-solid fa-folder-tree"></i>
                        <span>File Manager</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
