
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
        <h2>Tambah Anak Asuh</h2>
        <a href ='{{ route('admin-data-anak') }}' class ="btn btn-secondary"><< Kembali</a>
        <form action="{{ route('admin-data-anak-edit', ['id' => $data_anak->id_anak]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_anak">Nama Anak</label>
                <input type="text" class="form-control" id="nama_anak" name="nama_anak" value ="{{ $data_anak->nama_anak}}" required>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                    <option value="Laki-Laki" {{ $data_anak->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="Perempuan" {{ $data_anak->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>    
                </select>
            </div>
            <div class="form-group">
                <label for="pendidikan">Pendidikan</label>
                <select class="form-control" id="pendidikan" name="pendidikan">
                    <option value="Tidak Sekolah" {{ $data_anak->pendidikan == 'Tidak Sekolah' ? 'selected' : '' }}>Tidak Sekolah</option>
                    <option value="TK" {{ $data_anak->pendidikan == 'TK' ? 'selected' : '' }}>TK</option>
                    <option value="SD" {{ $data_anak->pendidikan == 'SD' ? 'selected' : '' }}>SD</option>
                    <option value="SMP" {{ $data_anak->pendidikan == 'SMP' ? 'selected' : '' }}>SMP</option>
                    <option value="SMA" {{ $data_anak->pendidikan == 'SMA' ? 'selected' : '' }}>SMA</option>
                    <option value="Kuliah" {{ $data_anak->pendidikan == 'Kuliah' ? 'selected' : '' }}>Kuliah</option>       
                </select>
            </div>
            <div class="form-group">
                <label for="status_ortu">Status Orang Tua</label>
                <select class="form-control" id="status_ortu" name="status_ortu">
                    <option value="Yatim" {{ $data_anak->status_ortu == 'Yatim' ? 'selected' : '' }}>Yatim</option>
                    <option value="Piatu" {{ $data_anak->status_ortu == 'Piatu' ? 'selected' : '' }}>Piatu</option> 
                    <option value="Yatim Piatu {{ $data_anak->status_ortu == 'Yatim Piatu' ? 'selected' : ''}}">Yatim Piatu</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value ="{{$data_anak->tanggal_lahir}}" required>
            </div>
            <button type="submit" class="btn btn-primary" show>Ubah Data</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.all.min.js"></script>
    @if (session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}'
            });
        });
    </script>
    @endif
    @if (session('error'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: "error",
                title: "Error!",
                text: "Gagal membuat data!",
            });
        });
    </script>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</body>
</html>
