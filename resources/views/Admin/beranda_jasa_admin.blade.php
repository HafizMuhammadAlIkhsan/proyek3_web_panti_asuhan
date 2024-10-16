<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Admin Donasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8e5e5;
        }
        .sidebar {
            background-color: #2c3e50;
            color: white;
            height: 100vh;
            padding-top: 20px;
        }
        .sidebar .nav-link {
            color: white;
            padding: 10px 15px;
        }
        .sidebar .nav-link:hover {
            background-color: #34495e;
        }
        .main-content {
            padding: 20px;
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
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                            <a class="nav-link active" href="#">
                                Beranda
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#">
                                Donasi
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#">
                                Data Anak
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#">
                                Berita
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-10 ms-sm-auto px-md-4 main-content">
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
                            <button class="btn btn-primary">Detail Donasi</button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

