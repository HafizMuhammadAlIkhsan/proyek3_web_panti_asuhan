<div class="sidebar">
    <div class="logo">
        <img src="image/logo_panti.png" alt="Logo" width="32.519" height="30.7" style="fill: #363b46;">
        <span> Profile </span>
    </div>
    <ul class="menu-item">
        <li class="{{ request()->routeIs('hal_profile_donatur') ? 'active' : '' }}">
            <a href="{{ route('hal_profile_donatur') }}" >
                <ion-icon name="apps-outline"></ion-icon>
                <span style="--i:1"> Profile </span>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('RiwayatDonasi_donasi') }}">
                <ion-icon name="wallet-outline"></ion-icon>
                <span style="--i:2"> Riwayat Donasi </span>
            </a>
        </li>
        <li class="menu-item" id="news-item">
            <a href="#" class="link" onclick="">
                <ion-icon name="newspaper-outline"></ion-icon>
                <span style="--i:3"> Laporan </span>
            </a>
        </li>
        <li class="menu-item" id="program-item">
            <a href="#" class="link" onclick="setActive('program-item')">
                <ion-icon name="calendar-outline"></ion-icon>
                <span style="--i:4"> Pengaturan </span>
            </a>
        </li>
        <li class="{{ request()->routeIs('beranda_donatur') ? 'active' : '' }}">
            <a href="{{ route('beranda_donatur') }}">
            <div>
                <button class="log" onclick="window.location.href={{ route('beranda_donatur') }}">Back</button>
            </div>
            </a>
        </li>
    </ul>
</div>
