<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Input_Jasa</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
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
    </style>
</head>

<body>
    @include('components.sidebaradmin')
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-10 ms-sm-auto px-md-4 main-content">
                <div class="welcome-card">
                    <h1>Donasi Jasa</h1>
                    <form action="{{ route('donasi-jasa.store') }}" method="POST">
                        @csrf  <!-- Include the CSRF token for security -->
                    
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Donatur</label>
                            <input type="email" class="form-control" id="email" name="email_pengurus" placeholder="Email" required>
                        </div>
                    
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi Jasa Tersebut</label>
                            <textarea class="form-control" id="description" name="nama_jasa" placeholder="Contoh: Guru Mendidik Anak Asuh Mengenai Pelajaran Matematika SMP" rows="3" required></textarea>
                        </div>
                    
                        <div class="mb-3">
                            <label for="start-date" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="start_date" name="jadwal_mulai" required>
                        </div>
                    
                        <div class="mb-3">
                            <label for="duration" class="form-label">Tanggal Berakhir</label>
                            <input type="date" class="form-control" id="end_date" name="jadwal_selesai" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </main>
            

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
