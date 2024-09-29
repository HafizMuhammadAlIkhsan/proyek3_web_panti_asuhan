<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>BERANDA DONATUR</title>
</head>

<body>
    <div class="sidebar">
        <div class="logo">
            <img src="image/logo_panti.png" alt="Logo" width="32.519" height="30.7" style="fill: #363b46;">
            <span> Panti Asuhan </span>
        </div>
        <ul class="menu-item">
            <li class="menu-item active" id="home-item">
                <a href="/" class="link" onclick="setActive('home-item')">
                    <ion-icon name="apps-outline"></ion-icon>
                    <span style="--i:1"> Beranda </span>
                </a>
            </li>
            <li class="menu-item" id="donasi-item">
                <a href="/Donasi" class="link" onclick="setActive('donasi-item')">
                    <ion-icon name="wallet-outline"></ion-icon>
                    <span style="--i:2"> Donasi </span>
                </a>
            </li>

            <li class="menu-item" id="news-item">
                <a href="#" class="link" onclick="setActive('news-item')">
                    <ion-icon name="newspaper-outline"></ion-icon>
                    <span style="--i:3"> Berita & Artikel </span>
                </a>
            </li>
            <li class="menu-item" id="program-item">
                <a href="#" class="link" onclick="setActive('program-item')">
                    <ion-icon name="calendar-outline"></ion-icon>
                    <span style="--i:4"> Program </span>
                </a>
            </li>
            <li class="menu-item" id="info-item">
                <a href="#" class="link" onclick="setActive('info-item')">
                    <ion-icon name="balloon-outline"></ion-icon>
                    <span style="--i:5"> Anak Asuh </span>
                </a>
            </li>
            <li class="menu-item no-hover">
                <div class="logButton">
                    <button class="log" id="loginButton">Login</button>
                </div>
                {{-- <a href="#" class="link" onclick="setActive('info-item')">
                    <img src="image/logo_panti.png" alt="" >
                    <span >
                        <p>selamat datang</p>
                        <h4>Hafiz</h4>
                    </span>
                    <span class="arrow">&gt;</span> --}}
                </a>
            </li>
        </ul>
    </div>

    <div class="home">
        <h1>Beranda</h1>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>