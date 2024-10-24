<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Anak Asuh</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>

    <!-- Main content -->
    <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4">
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
                        <th scope="col">
                            <input type="checkbox">
                        </th>
                        <th scope="col">Nama Anak</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Pendidikan</th>
                        <th scope="col">Status Orang Tua</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_anak as $anak)
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>{{ $anak->nama_anak }}</td>
                        <td>{{ $anak->jenis_kelamin }}</td>
                        <td>{{ $anak->pendidikan }}</td>
                        <td>{{ $anak->status_ortu }}</td>
                        <td>{{ $anak->tanggal_lahir }}</td>
                        <td>
                            <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            <button class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between">
            <button class="btn btn-secondary">Previous</button>
            <p>Page 1 of 10</p>
            <button class="btn btn-secondary">Next</button>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
