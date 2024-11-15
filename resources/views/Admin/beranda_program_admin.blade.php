<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beranda Jasa</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        .main {
            width: 100%;
            height: 100%;
            background-color: #F5F5F9;
            padding: 20px 0;
        }

        .header-banner {
            background-color: #D1B2FF;
            width: 100%;
            padding: 20px 0;
            text-align: center;
            color: #fff;
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .card-container {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin: 0 auto;
            max-width: 800px;
        }

        .custom-card {
            width: 250px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .custom-card img {
            width: 80px;
            height: 80px;
            margin-bottom: 10px;
        }

        .custom-card h5 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .custom-card p {
            color: #666;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .custom-button {
            background-color: #D1B2FF;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 14px;
            width: 100%;
        }

        .custom-button:hover {
            background-color: #7243b7;
            width: 100%;
        }

        .icon{
            font-size: 50px;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px; 
            background-color: #F5F5F9;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    @include('components.sidebaradmin')
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <div class="main">
        <div class="header-banner">Donasi Jasa</div>

        <div class="card-container">
            <div class="custom-card">
                <ion-icon name="medkit-outline" class="icon"></ion-icon>
                <h5>List Program</h5>
                <p>Lihat Program Yang tersedia</p>
                <button class="custom-button" onclick="window.location.href='{{ route('list-program') }}'" >Ke List Donasi</button>
            </div>
            <div class="custom-card">
                <ion-icon name="person-add-outline" class="icon"></ion-icon>
                <h5>Tambah Program</h5>
                <p>Tambahkan Program baru </p>
                <button class="custom-button" onclick="window.location.href='{{ route('insert-program') }}'">Donasi Jasa</button>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
