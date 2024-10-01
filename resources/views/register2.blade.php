<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register 2</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .container {
            display: flex;
            max-width: 900px;
            width: 100%;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .form-container {
            width: 100%;
            padding: 40px;
            background-color: #eee;
        }
        .form-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
        }
        .form-container form {
            display: flex;
            flex-direction: column;
        }
        .form-container input {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container select {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container label {
            font-size: 16px;
            margin-bottom: 5px;
        }
        .form-container .radio-group {
            margin-bottom: 15px;
        }
        .form-container button {
            padding: 10px;
            font-size: 16px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="form-container">
            <h2>Complete Your Profile</h2>
            <form>
                <input type="text" placeholder="Nama Lengkap" required>
                <input type="text" placeholder="Alamat" required>
                <input type="text" placeholder="Pekerjaan" required>

                <!-- Tanggal Lahir -->
                <label for="tanggal-lahir">Tanggal Lahir</label>
                <div style="display: flex; gap: 10px;">
                    <select id="tanggal" required>
                        <option value="">Tanggal</option>
                        <!-- Pilihan tanggal 1-31 -->
                        <script>
                            for (let i = 1; i <= 31; i++) {
                                document.write('<option value="' + i + '">' + i + '</option>');
                            }
                        </script>
                    </select>
                    <select id="bulan" required>
                        <option value="">Bulan</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                    <select id="tahun" required>
                        <option value="">Tahun</option>
                        <!-- Pilihan tahun dari 1950 hingga 2024 -->
                        <script>
                            let year = new Date().getFullYear();
                            for (let i = year; i >= 1950; i--) {
                                document.write('<option value="' + i + '">' + i + '</option>');
                            }
                        </script>
                    </select>
                </div>

                <!-- Jenis Kelamin -->
                <label>Jenis Kelamin</label>
                <div class="radio-group">
                    <input type="radio" id="laki-laki" name="gender" value="Laki-laki" required>
                    <label for="laki-laki">Laki-laki</label>
                    <input type="radio" id="perempuan" name="gender" value="Perempuan" required>
                    <label for="perempuan">Perempuan</label>
                </div>

                <button type="submit">Selesai</button>
                <button type="submit">Lanjut</button>
            </form>
        </div>
    </div>

</body>
</html>
