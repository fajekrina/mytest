<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a href="{{ url('blank') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="@yield('kendaraan')">
                <a href="{{ route('kendaraan.index') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Kendaraan</span>
                </a>
            </li>
            <li class="@yield('titip')">
                <a href="{{ route('titip.index') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Titip</span>
                </a>
            </li>
            <li class="@yield('sewa')">
                <a href="{{ route('sewa.index') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Sewa</span>
                </a>
            </li>
        </ul>
    </div>
</div>
