<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Anak Asuh</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400&display=swap" rel="stylesheet">
    <style>
        .main-content {
            margin-left: 250px; /* Menyesuaikan margin untuk konten utama agar tidak tertutup sidebar */
            padding: 20px; /* Padding untuk konten utama */
            background-color: #f9f9f9; /* Warna latar belakang konten utama */
        }
         body {
            background-color: #F5F5F9;
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
        .sidebar ul li:last-child {
        position:absolute;
        bottom:0;
        width:100%;
        height:60px;
        }
    </style>
</head>
<body>
    @include ('components.sidebardonatur')
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <main class="main-content">
    <!-- Main content -->
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="text-center">List Anak Asuh</h1>
        </div>

        <!-- Tabel Anak Asuh -->
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Anak</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Pendidikan</th>
                        <th scope="col">Status Orang Tua</th>
                        <th scope="col">Tanggal Lahir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = $data_anak->firstItem() ?>
                    @foreach ($data_anak as $anak)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $anak->nama_anak }}</td>
                        <td>{{ $anak->jenis_kelamin }}</td>
                        <td>{{ $anak->pendidikan }}</td>
                        <td>{{ $anak->status_ortu }}</td>
                        <td>{{ $anak->tanggal_lahir }}</td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>
            {{$data_anak->links() }}
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
