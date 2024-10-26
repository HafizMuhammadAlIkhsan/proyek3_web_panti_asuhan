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

        .stripe {
            background-color: #661AD1;
            width: 100%;
            height: 25px;
        }

        .main {
            width: 100%;
            height: 100%;
            background-color: #F5F5F9;
        }

        .Middle-Container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
        }

        .welcome-card {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px;
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        form {
            width: 100%;
        }

        .form-label {
            font-weight: bold;
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
            <div class="stripe">
                <button type="button" onclick="window.location.href='{{ route('list-jasa') }}'">test</button>
            </div>
            <div class="welcome-card">
                <h1>Donasi Jasa</h1>
                <form action="{{ route('insert-jasa') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Donatur</label>
                        <input type="email" class="form-control" id="email" name="email_admin" placeholder="Email"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Jasa Tersebut</label>
                        <textarea class="form-control" id="description" name="nama_jasa" placeholder="Deskripsi Jasa" rows="3" required></textarea>
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
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
