{{-- resources/views/beranda_admin.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Admin Donasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <style>
        body {
            background-color: #f8e5e5;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background: white;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.05);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 30px;
        }

        .logo img {
            width: 32px;
            height: 32px;
        }

        .logo span {
            font-weight: 600;
            font-size: 18px;
            color: #333;
        }

        .menu-item {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu-item li {
            margin-bottom: 15px;
        }

        .menu-item a {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            text-decoration: none;
            color: #6B7280;
            border-radius: 8px;
            transition: all 0.3s;
            gap: 12px;
        }

        .menu-item a:hover, .menu-item a.active {
            background-color: #F3F4F6;
            color: #6366F1;
        }

        .menu-item ion-icon {
            font-size: 20px;
        }

        .login-btn {
            position: fixed;
            bottom: 20px;
            left: 20px;
            width: calc(250px - 40px);
            padding: 12px;
            background: #6366F1;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            font-weight: 500;
        }

        .login-btn:hover {
            background: #4F46E5;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }

        .welcome-card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .feature-card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .feature-card img {
            width: 80px;
            height: 80px;
            margin-bottom: 10px;
        }

        .feature-card h4 {
            margin-bottom: 15px;
        }

        .sidebar ul li:last-child {
        position:absolute;
        bottom:0;
        width:100%;
        height:60px;
        }

    </style>
</head>
<body>
    <div class="container-fluid p-0">
        @include('components.sidebaradmin')

        <main class="main-content">
            <div class="welcome-card">
                <div class="row align-items-center">
                    <div class="col-md-9">
                        <h2>Selamat Datang, Agra!</h2>
                        <p>Have a nice day at work today :D</p>
                    </div>
                    <div class="col-md-3 text-end">
                        <img src="https://via.placeholder.com/100" alt="Profile Picture" class="rounded-circle" width="100" height="100">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="feature-card">
                        <img src="https://via.placeholder.com/80" alt="Donasi Uang">
                        <h4>Uang Tunai</h4>
                        <button class="btn btn-primary">Detail Donasi</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <img src="https://via.placeholder.com/80" alt="Donasi Barang">
                        <h4>Donasi Barang</h4>
                        <button class="btn btn-primary">Detail Donasi</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <img src="https://via.placeholder.com/80" alt="Donasi Jasa">
                        <h4>Donasi Jasa</h4>
                        <button class="btn btn-primary" onclick="window.location.href='{{ route('hal_beranda_jasa_admin') }}'">Detail Donasi</button>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>