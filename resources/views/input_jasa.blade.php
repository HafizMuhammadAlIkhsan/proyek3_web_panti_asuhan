<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Input_Jasa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
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
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        form label {
            margin-top: 10px;
        }

        button[type="submit"] {
            margin-top: 20px;
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
                                Admin Page
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="/beranda_donatur">
                                Donasi
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-10 ms-sm-auto px-md-4 main-content">
                <div class="welcome-card">
                    <h1>Donasi Jasa</h1>
                    <form>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Donatur</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi Jasa Tersebut</label>
                            <textarea class="form-control" id="description" placeholder="Contoh: Guru Mendidik Anak Asuh Mengenai Pelajaran Matematika SMP" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="start-date" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="start-date" required>
                        </div>

                        <div class="mb-3">
                            <label for="duration" class="form-label">Durasi</label>
                            <input type="text" class="form-control" id="duration" placeholder="Ex: 1 Hari" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
