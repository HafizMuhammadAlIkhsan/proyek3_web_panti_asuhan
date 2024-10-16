<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400&display=swap" rel="stylesheet">
    <title>DONASI</title>
</head>

<body>
    @include('components.sidebardonatur')

    <div class="container"> 
        <h1 class="title">BERIKAN BANTUAN KEPADA <br>MEREKA YANG <span style="color: #9f5ffe;">MEMBUTUHKAN</span></h1>
        <div class="home">
            <div class="box1">
                <img src="https://via.placeholder.com/297x220" alt="Contoh Gambar"> 
                <h2>Donasi Uang </h2>
                <button class="donate-button">Donasi Sekarang</button>
            </div>
            <div class="box2">
                <img src="https://via.placeholder.com/297x220" alt="Contoh Gambar">
                <h2>Donasi Barang</h2>
                <button class="donate-button">Donasi Sekarang</button>
            </div>
            <div class="box3">
                <img src="https://via.placeholder.com/297x220" alt="Contoh Gambar">
                <h2>Donasi Jasa</h2>
                <button class="donate-button" onclick="window.location.href='{{ route('hal_donasi_jasa') }}'">Donasi Sekarang</button>
            </div>
        </div>
    </div>
    

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>