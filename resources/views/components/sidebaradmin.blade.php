<style>
    .sidebar{
        border-right: 1px solid black;
        margin: 0px;
    }
</style>

<div class="sidebar">
    <div class="logo">
        <img src="{{ asset ('image/logo_panti.png')}}" alt="Logo" width="32.519" height="30.7" style="fill: #363b46;">
        <span> Admin Panti </span>
    </div>
    <ul class="menu-item">
        {{-- <li class="menu-item" id="home-item"> --}}
        <li class="{{ request()->routeIs('hal_beranda_admin') ? 'active' : '' }}">
            <a href="{{ route('hal_beranda_admin') }}">
                <ion-icon name="apps-outline"></ion-icon>
                <span style="--i:1"> Beranda </span>
            </a>
        </li>
        <li class="{{ request()->routeIs('hal_beranda_donasi_admin') || request()->routeIs('hal_beranda_donasi_admin') ? 'active' : '' }}">
            <a href="{{ route('hal_beranda_donasi_admin') }}">
                <ion-icon name="wallet-outline"></ion-icon>
                <span style="--i:2"> Donasi </span>
            </a>
        </li>
        <li class="{{ request()->routeIs('hal_beranda_berita_admin') || request()->routeIs('hal_beranda_berita_admin') ? 'active' : '' }}" id="news-item">
            <a href="{{ route('hal_beranda_berita_admin') }}" class="link" onclick="setActive('input_berita')">
                <ion-icon name="newspaper-outline"></ion-icon>
                <span style="--i:3">Berita</span>
            </a>
        </li>
        <li class="{{ request()->routeIs('hal_beranda_program_admin') || request()->routeIs('hal_beranda_program_admin') ? 'active' : '' }}" id="program-item">
            <a href="{{ route('hal_beranda_program_admin') }}" class="link" onclick="setActive('program-item')">
                <ion-icon name="calendar-outline"></ion-icon>
                <span style="--i:4"> Data Program </span>
            </a>
        </li>
        <li class="{{ request()->routeIs('admin-data-anak') ? 'active' : ''}}">
            <a href="{{ route('admin-data-anak') }}">
                <ion-icon name="accessibility-outline"></ion-icon>
                <span style="--i:5"> Data Anak Asuh </span>
            </a>
        </li>
        <li class="{{ request()->routeIs('beranda_create_admin') ? 'active' : ''}}">
            <a href="{{ route('beranda_create_admin') }}">
                <ion-icon name="accessibility-outline"></ion-icon>
                <span style="--i:5"> Data Admin </span>
            </a>
        </li>
        <li class="menu-item no-hover">
            {{-- <a href="#" class="link" id="user-info">
                <!-- Konten yang akan ditampilkan jika sudah login -->
                <div class="logged-in" style="display: none;">
                    <img src="image/logo_panti.png" alt="">
                    <span style="--i:6" class="text-container">
                        <div>
                            <p>Selamat Datang</p>
                            <h4>Hafiz</h4>
                        </div>
                        <span class="arrow"> &gt; </span>
                    </span>
                </div>
        
                <!-- Tombol Login yang akan ditampilkan jika belum login -->
                <div class="logged-out">
                    <button id="login-btn">Login</button>
                </div>
            </a> --}}
            {{-- <div>
                <button class="log" id="loginButton" onclick="window.location.href='/Login'">Login</button>
            </div> --}}
            <a href="#" class="link" onclick="setActive('info-item')">
                <img src="{{asset ('image/user.png')}}" alt="" >
                <span >
                    <p>selamat datang</p>
                    <h4>user</h4>
                </span>
                <span class="arrow">&gt;</span>
            </a>
        </li>
    </ul>
</div>
