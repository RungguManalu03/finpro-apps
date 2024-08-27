
<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        <a href="index-2.html" class="logo logo-dark">
            <span class="logo-lg">
                <img src="{{ asset('assets/logo-kost.jpg') }}" alt="" width="120">
                <h6>CMS ADMIN INFO KOST</h6>
            </span>
        </a>
        <a href="index-2.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/logo-kost.jpg') }}" alt="" width="120">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/logo-kost.jpg') }}" alt="" width="120">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                @if (Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ Request::is('manajemen-user') ? 'active' : '' }}"
                            href="{{ route('manajemen-user') }}" role="button">
                            <i class="ri-user-line"></i> <span data-key="t-dashboards">Manajemen User</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" {{ Request::is('manajemen-kost') ? 'active' : '' }}
                            href="{{ route('manajemen-kost') }}" role="button">
                            <i class="ri-home-line"></i> <span data-key="t-dashboards">Manajemen Kost</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ Request::is('manajemen-booking') ? 'active' : '' }}"
                            href="{{ route('manajemen-booking') }}" role="button">
                            <i class="ri-calendar-line"></i> <span data-key="t-dashboards">Manajemen Booking</span>
                        </a>
                    </li>
                    @endif
                @if (Auth::user()->role == 'user')
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ Request::is('manajemen-booking') ? 'active' : '' }}"
                            href="{{ route('manajemen-booking') }}" role="button">
                            <i class="ri-calendar-line"></i> <span data-key="t-dashboards">History Booking</span>
                        </a>
                    </li>
                @endif
                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
<div class="vertical-overlay"></div>
