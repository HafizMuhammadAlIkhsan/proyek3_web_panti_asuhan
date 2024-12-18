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
            background: linear-gradient(to right, rgb(131, 78, 209), rgb(153, 61, 164), rgb(67,40,107));
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
            <form method="POST" action="{{ route('register.step2.post') }}">
                @csrf
                <input type="text" class="form-control" name="username" placeholder="Username">
                <input type="text" class="form-control" name="kota" placeholder="Alamat">
                <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan">
                <label for="tanggal-lahir">Tanggal Lahir</label>
                <div style="display: flex; gap: 10px;">
                    <select id="tanggal" name="tanggal">
                        <option value="">Tanggal</option>
                        <script>
                            for (let i = 1; i <= 31; i++) {
                                document.write('<option value="' + i + '">' + i + '</option>');
                            }
                        </script>
                    </select>
                    <select id="bulan" name="bulan">
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
                    <select id="tahun" name="tahun">
                        <option value="">Tahun</option>
                        <script>
                            let year = new Date().getFullYear();
                            for (let i = year; i >= 1950; i--) {
                                document.write('<option value="' + i + '">' + i + '</option>');
                            }
                        </script>
                    </select>
                </div>
                <label>Jenis Kelamin</label>
                <div class="radio-group">
                    <input type="radio" id="laki-laki" name="gender" value="1">
                    <label for="laki-laki">Laki-laki</label>
                    <input type="radio" id="perempuan" name="gender" value="0">
                    <label for="perempuan">Perempuan</label>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Selesai</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if (session('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = "{{ route('login') }}"; 
            });
        @endif
    
        @if ($errors->any())
            let errorMessages = [];
            @foreach ($errors->all() as $error)
                errorMessages.push('{{ $error }}');
            @endforeach
            
            Swal.fire({
                icon: 'error',
                title: 'Kesalahan!',
                html: errorMessages.join('<br>'),
            });
        @endif

        @if ($errors->has('tanggal_lahir'))
            Swal.fire({
                icon: 'error',
                title: 'Kesalahan!',
                text: '{{ $errors->first('tanggal_lahir') }}',
                confirmButtonText: 'OK'
            });
        @endif
    </script>
</body>
</html>
