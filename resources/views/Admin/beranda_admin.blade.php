<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME_DONATUR</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #F5F5F9;
            overflow-x: hidden;
        }

        .main {
            width: 100%;
            height: 100%;
            background-color: #F5F5F9;
        }

        .Top-Container {
            background-color: #ffffff;
            width: 100%;
            height: 80px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .Center-Top {
            border: 3px solid #000000;
            width: 50px;
            height: 50px;
        }


        .Middle-Container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            width: 90%;
        }

        .profile-section {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .profile-section img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            margin-bottom: 15px;
        }

        .profile-section h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .profile-section p {
            font-size: 18px;
            color: #666;
        }

        .donation-summary h3 {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .donation-stats {
            display: flex;
            flex-direction: column;
            gap: 20px;
            justify-content: space-between;
            width: 200px;
        }

        .donation-stats div {
            text-align: center;
        }

        .donation-stats .approved {
            color: blue;
        }

        .donation-stats .pending {
            color: orange;
        }

        .donation-stats .total {
            color: green;
        }

        .Bottom-Container {
            width: 100%;
            height: auto;
            background-color: #ffffff;
            border-top: 3px solid black;
            display: flex;
            flex-direction: row;

            justify-content: space-between;
            padding: 20px;
        }

        .Bottom-container-stripe {
            background-color: #661AD1;
            width: 100%;
            height: 25px;
            margin-top: 2px;
        }

        .Bottom-Button {
            display: flex;
            flex-direction: Row;
            gap: 50%;
            padding-top: 10px;
            padding-left: 20px;
        }

        .button-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .button {
            display: flex;
            align-items: center;
            background-color: #F5F5F5;
            border-radius: 20px;
            padding: 15px 20px;
            width: 300px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            color: #333;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .button:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .button-icon {
            background-color: #FFFFFF;
            border-radius: 50%;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }

        .button-icon img {
            width: 25px;
            height: 25px;
        }

        .notification-icon {
            position: relative;
        }

        .notification-dot {
            position: absolute;
            top: 0;
            right: 0;
            width: 8px;
            height: 8px;
            background-color: #FF5722;
            border-radius: 50%;
        }

        .donation-summary {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #f5f5f5;
            border-radius: 10px;
            padding-left: 20px;
            padding-right:20px; 
            width: 400px;
        }

        .icon {
            font-size: 100px;
        }

        .icon-2 {
            font-size: 33px;
        }
    </style>
</head>

<body>
    @include('components.sidebaradmin')

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <div class="main">
        <!-- Top container -->
        <div class="Top-Container">
            <div class="Center-Top"></div>
        </div>

        <!-- Middle container with profile and donation summary -->
        <div class="Middle-Container">
            <div class="profile-section">
                <ion-icon name="person-circle-outline" class="icon"></ion-icon>
                <h2>Selamat Datang, {{ $ProfileAdmin['nama_pengurus'] }}</h2>
                <p>Halo Saya &lt;Nama&gt;, &lt;Personal Bio&gt;</p>
            </div>
        </div>

        <!-- Bottom container with buttons -->
        <div class="Bottom-container-stripe"></div>
        <div class="Bottom-Container">
            <div class="Bottom-Container-button">
                <div class="Bottom-Button">
                    <div class="button-container">
                        <a href="{{ route('hal_beranda_donasi_admin') }}" class="button">
                            <div class="button-icon notification-icon">
                                <ion-icon name="notifications-outline" class="icon-2"></ion-icon>
                                <span class="notification-dot"></span>
                            </div>
                            <span>&lt;INT&gt; Donasi Menunggu untuk di konfirmasi</span>
                        </a>

                        <a href="#" class="button">
                            <div class="button-icon">
                                <ion-icon name="newspaper-outline" class="icon-2"></ion-icon>
                            </div>
                            <span>Upload Berita</span>
                        </a>

                        <a href="#" class="button">
                            <div class="button-icon">
                                <ion-icon name="people-outline" class="icon-2"></ion-icon>
                            </div>
                            <span>Kelola Data Anak</span>
                        </a>
                    </div>
                    <div class="donation-summary">
                        <h3>Rekap Donasi</h3>
                        <div class="donation-stats">
                            <div class="approved">
                                <strong>Approved</strong><br> 151 Donasi
                            </div>
                            <div class="pending">
                                <strong>Pending</strong><br>
                                100 Donasi
                            </div>
                            <div class="total">
                                <strong>Jumlah Donasi</strong><br>
                                251 Donasi
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
