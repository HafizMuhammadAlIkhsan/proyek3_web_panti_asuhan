<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Anak Asuh</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400&display=swap" rel="stylesheet">
    <style>
        /* Menambahkan beberapa styling untuk memastikan layout yang baik */
        .main-content {
            margin-left: 250px; /* Menyesuaikan margin untuk konten utama agar tidak tertutup sidebar */
            padding: 20px; /* Padding untuk konten utama */
            background-color: #f9f9f9; /* Warna latar belakang konten utama */
        }
    </style>
</head>
<body>
    @include ('components.sidebaradmin')
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <main class="main-content">
    <!-- Main content -->
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="text-center">List Anak Asuh</h1>
        </div>

        <!-- Tambah Data Button -->
        <div class="d-flex justify-content-end mb-3">
            <a href="data-anak/create" class="btn btn-primary">Tambah Data</a>
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
                        <th scope="col">Aksi</th>
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
                        <td>
                            <a href ='{{url('admin/data-anak/'.$anak->id_anak.'/edit')}}' class ="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ url('admin/data-anak/'.$anak->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
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
