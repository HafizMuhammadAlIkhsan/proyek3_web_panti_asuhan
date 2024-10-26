
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Anak Asuh</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
              <!-- Menampilkan pesan sukses jika ada -->
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>

          @endif
        <h2>Tambah Anak Asuh</h2>
        <form action="{{ route('admin-data-anak-store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_anak">Nama Anak</label>
                <input type="text" class="form-control" id="nama_anak" name="nama_anak" required>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="pendidikan">Pendidikan</label>
                <input type="text" class="form-control" id="pendidikan" name="pendidikan" required>
            </div>
            <div class="form-group">
                <label for="status_ortu">Status Orang Tua</label>
                <select class="form-control" id="status_ortu" name="status_ortu">
                    <option value="Yatim">Yatim</option>
                    <option value="Piatu">Piatu</option>
                    <option value="Yatim Piatu">Yatim Piatu</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
    </div>
</body>
</html>
