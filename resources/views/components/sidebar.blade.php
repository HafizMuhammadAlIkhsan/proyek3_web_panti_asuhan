<div class="sidebar">
    <div class="logo">
        <img src="{{ asset('image/logo_panti.png') }}" alt="Logo" width="32.519" height="30.7" style="fill: #363b46;">
        <span> Panti Asuhan </span>
    </div>
    <ul class="menu-item">
        {{-- <li class="menu-item" id="home-item"> --}}
        <li class="{{ request()->routeIs('beranda_umum') ? 'active' : '' }}">
            <a href="{{ route('beranda_umum') }}">
                <ion-icon name="apps-outline"></ion-icon>
                <span style="--i:1"> Beranda </span>
            </a>
        </li>
        <li class="{{ request()->routeIs('hal_donasi_umum') || request()->routeIs('hal_donasi_jasa') ? 'active' : '' }}">
            <a href="{{ route('hal_donasi_umum') }}">
                <ion-icon name="wallet-outline"></ion-icon>
                <span style="--i:2"> Donasi </span>
            </a>
        </li>
        <li class="{{ request()->routeIs('berita.index') || request()->routeIs('berita.index') ? 'active' : '' }}" id="news-item">
            <a href="{{ route('berita.index') }}" class="link" onclick="setActive('news-item')">
                <ion-icon name="newspaper-outline"></ion-icon>
                <span style="--i:3"> Berita & Artikel </span>
            </a>
        </li>
        <li class="{{ request()->routeIs('program.index') || request()->routeIs('program.index') ? 'active' : '' }}" id="program-item">
            <a href="{{ route('program.index') }}" class="link" onclick="setActive('program-item')">
                <ion-icon name="calendar-outline"></ion-icon>
                <span style="--i:4"> Program </span>
            </a>
        </li>
        <li class="{{ request()->routeIs('masyarakat-data-anak') ? 'active' : ''}}" id="info-item">
            <a href="{{ route('masyarakat-data-anak')}}" class="link" onclick="setActive('info-item')">
                <ion-icon name="balloon-outline"></ion-icon>
                <span style="--i:5"> Anak Asuh </span>
            </a>
        </li>
        <li class="menu-item no-hover">
            <div>
                <button class="log" id="loginButton" onclick="window.location.href='/login'">Login</button>
            </div>
        </li>
    </ul>
</div>
