<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Anak Asuh</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        
    </style>
</head>
<body>
    @include('components.sidebaradmin')

            <!-- Main content -->
            <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <h1 class="text-center">List Anak Asuh</h1>
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
                            <tr>
                                <td><input type="checkbox" checked></td>
                                <td>John Doe</td>
                                <td>Laki-laki</td>
                                <td>SMA</td>
                                <td>Yatim</td>
                                <td>10-10-2024</td>
                                <td>
                                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                    <button class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>John Doe</td>
                                <td>Perempuan</td>
                                <td>SMP</td>
                                <td>Piatu</td>
                                <td>10-10-2024</td>
                                <td>
                                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                    <button class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></button>
                                </td>
                            </tr>
                            <!-- Tambah lebih banyak data seperti contoh di atas -->
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-secondary">Previous</button>
                    <p>Page 1 of 10</p>
                    <button class="btn btn-secondary">Next</button>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
