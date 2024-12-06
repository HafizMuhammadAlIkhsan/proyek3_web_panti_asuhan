<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Panti Asuhan</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #F5F5F9;
            font-family: Arial, sans-serif;
        }

        .main {
            width: 100%;
            min-height: 100vh;
            background-color: #F5F5F9;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .Top-Container {
            background-color: #FFFFFF;
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

        .stripe {
            background-color: #D1B2FF;
            width: 100%;
            height: 25px;
        }

        .Middle-Container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .welcome-card {
            background-color: #FFFFFF;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px;
            margin-top: 20px;
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .form-label {
            font-weight: bold;
            color: #333;
        }

        .btn-primary {
            background-color: #D1B2FF;
            border: none;
            width: 100%;
            padding: 10px;
        }

        .btn-primary:hover {
            width: 100%;
            background-color: #D1B2FF;
        }

        @media (min-width: 768px) {
            .welcome-card {
                width: 70%;
            }
        }

        @media (min-width: 1024px) {
            .welcome-card {
                width: 50%;
            }
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
        <div class="Top-Container">
            <div class="Center-Top"></div>
        </div>

        <div class="Middle-Container">
            <div class="stripe"></div>
            <div class="welcome-card">
                <h1>Edit Informasi Panti</h1>

                <!-- Pesan Sukses -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Form Edit -->
                <form action="{{ route('panti.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                
                    <div class="mb-3">
                        <label for="email_panti" class="form-label">Email Panti</label>
                        <input type="email" class="form-control" id="email_panti" name="email_panti"
                               value="{{ $panti->email_panti }}" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="nama_panti" class="form-label">Nama Panti</label>
                        <input type="text" class="form-control" id="nama_panti" name="nama_panti"
                               value="{{ $panti->nama_panti }}" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="lokasi_panti" class="form-label">Lokasi Panti</label>
                        <textarea class="form-control" id="lokasi_panti" name="lokasi_panti" rows="3" required>{{ $panti->lokasi_panti }}</textarea>
                    </div>
                
                    <div class="mb-3">
                        <label for="nomer_cp" class="form-label">Contact Person</label>
                        <input type="text" class="form-control" id="nomer_cp" name="nomer_cp"
                               value="{{ $panti->nomer_cp }}" placeholder="Masukkan Nomor HP">
                    </div>
                
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>                
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>
