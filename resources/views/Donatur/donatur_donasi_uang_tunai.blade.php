<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donasi Uang Tunai</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background-color: #f5f5f5;
        }

        .content {
            width: calc(100% - 260px);
            padding-top: 10px;
        }

        .navigation {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 30px;
            background-color: #ffffff;
            width: 100%;
            height: 40px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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

        .nav-button {
            border: none;
            background: none;
            font-size: 16px;
            cursor: pointer;
            color: #666;
        }

        .nav-button.active {
            color: #8B5CF6;
            border-bottom: 2px solid #8B5CF6;
        }

        .page-title {
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
        }

        .page-title span {
            color: #8B5CF6;
        }

        .donation-form {
            max-width: 500px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group label {
            color: #666;
            font-size: 14px;
        }

        .form-control {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
        }

        .submit-button {
            background-color: #8B5CF6;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .submit-button:hover {
            background-color: #7C3AED;
        }

        .verification-form {
            max-width: 500px;
            margin: 0 auto;
            display: none;
        }

        .verification-form.active {
            display: block;
        }

        /* Sidebar specific styles from provided CSS */
        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 30px;
        }

        .menu-item {
            list-style: none;
        }

        .menu-item li {
            margin-bottom: 15px;
        }

        .menu-item a {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: #363b46;
        }

        .menu-item .active a {
            color: #8B5CF6;
        }
    </style>
</head>

<body>
    @include('components.sidebardonatur')
    <!-- Main content -->
    <div class="content">
        <div class="navigation">
            <button class="nav-button active">Uang</button>
            <button class="nav-button" onclick="showLoginAlert()">Barang</button>
            <button class="nav-button" onclick="showLoginAlert()">Jasa</button>
        </div>

        <h1 class="page-title">Donasi <span>Uang Tunai</span></h1>

        @if (session('success'))
            <!--Alert untuk mempermudah cek-->
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form class="donation-form" id="donationForm" action="{{ route('insert_donasi_uang_donatur') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="bukti_transfer" class="form-label">Bukti Pembayaran</label>
                <input type="file" class="form-control" id="bukti_transfer" name="bukti_transfer" required>
            </div>

            <div class="form-group">
                <label for="id_program">Pilih Program</label>
                <select id="id_program" name="id_program" class="form-control" required>
                    <option value="" disabled selected>Pilih Program</option>
                    @foreach ($programs as $program)
                        <option value="{{ $program->id_program }}">{{ $program->nama_program }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="jumlah_uang">Jumlah Donasi</label>
                <input type="number" id="jumlah_uang" name="jumlah_uang" class="form-control"
                    placeholder="Masukkan jumlah donasi" required>
            </div>

            <div class="form-group">
                <label for="cara_pembayaran">Metode Pembayaran</label>
                <select id="cara_pembayaran" name="cara_pembayaran" class="form-control" required>
                    <option value="" disabled selected>Metode Pembayaran</option>
                    <option value="transfer">Transfer Bank</option>
                    <option value="ewallet">E-Wallet</option>
                </select>
            </div>

            <button type="button" class="submit-button" onclick="showBankDetails()">Lihat Rekening Bank</button>
            <button type="submit" class="submit-button">Kirim Bukti Pembayaran</button>

    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
