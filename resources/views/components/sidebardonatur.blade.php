<div class="sidebar" action="{{ route('hal_profile_donatur.show') }}" method="POST">
    <div class="logo">
        <img src="{{ asset('image/logo_panti.png')}}"" alt="Logo" width="32.519" height="30.7" style="fill: #363b46;">
        <span> Panti Asuhan </span>
    </div>
    <ul class="menu-item">
        <li class="{{ request()->routeIs('beranda_donatur') ? 'active' : '' }}">
            <a href="{{ route('beranda_donatur') }}">
                <ion-icon name="apps-outline"></ion-icon>
                <span style="--i:1"> Beranda </span>
            </a>
        </li>
        <li class="{{ request()->routeIs('hal_donasi_donatur') || request()->routeIs('hal_donasi_jasa') ? 'active' : '' }}">
            <a href="{{ route('hal_donasi_donatur') }}">
                <ion-icon name="wallet-outline"></ion-icon>
                <span style="--i:2"> Donasi </span>
            </a>
        </li>
        <li class="menu-item" id="news-item">
            <a href="{{ route('katalog_berita') }}" class="link" onclick="setActive('news-item')">
                <ion-icon name="newspaper-outline"></ion-icon>
                <span style="--i:3"> Berita & Artikel </span>
            </a>
        </li>
        <li class="menu-item" id="program-item">
            <a href="{{ route('katalog_program') }}" class="link" onclick="setActive('program-item')">
                <ion-icon name="calendar-outline"></ion-icon>
                <span style="--i:4"> Program </span>
            </a>
        </li>
        <li class="{{ request()->routeIs('donatur-data-anak') ? 'active' : ''}}" id="info-item">
            <a href="{{ route ('donatur-data-anak') }}" class="link" onclick="setActive('info-item')">
                <ion-icon name="balloon-outline"></ion-icon>
                <span style="--i:5"> Anak Asuh </span>
            </a>
        </li>
        <li class="{{ request()->routeIs('hal_profile_donatur') ? 'active' : '' }}">
            <a href="{{ route('hal_profile_donatur.show') }}" >
                <img src="{{ asset ('image/user.png')}}" alt="" >
                <span >
                    <p>selamat datang</p>
                    {{-- <h4>{{ $profileData['email'] }}</h4> --}}
                </span>
                <span class="arrow">&gt;</span>
            </a>
        </li>
    </ul>
</div>