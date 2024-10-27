<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Jasa</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #F5F5F9;
        }

        .main {
            width: 100%;
            height: 100%;
            background-color: #F5F5F9;
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

        .Center-Top form {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .search-button {
            border: none;
            background: none;
            font-size: 1.2em;
        }

        .Mid-Container {
            background-color: #D1B2FF;
            width: 100%;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #ffffff;
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .table img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        th[colspan="Aksi"],
        td[colspan="Aksi"] {
            width: 20px;
            text-align: center;
        }

        .icon-btn {
            border: none;
            background: none;
            color: #000;
            transition: color 0.2s ease;
        }

        .icon-btn:hover {
            color: #5628a5;
        }

        .pagination-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .pagination a {
            color: #5628a5;
            margin: 0 5px;
            padding: 8px 16px;
            border-radius: 5px;
            border: 1px solid #D1B2FF;
            text-decoration: none;
            transition: background-color 0.2s ease;
        }

        .pagination a:hover {
            background-color: #D1B2FF;
            color: #fff;
        }

        .pagination .active a {
            background-color: #5628a5;
            color: #fff;
            border: 1px solid #5628a5;
        }

        .btn-primary {
            background-color: #D1B2FF;
            border-color: #D1B2FF;
            transition: background-color 0.2s ease;
        }

        .btn-primary:hover {
            background-color: #5628a5;
            border-color: #5628a5;
        }
    </style>
</head>

<body>
    @include('components.sidebaradmin')
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <div class="main">
        <div class="Top-Container">
            <div class="Center-Top">
                <form action="/" method="GET">
                    <input type="text" name="query" placeholder="Search Jasa" class="form-control">
                    <button type="submit" class="search-button">
                        <ion-icon name="search-outline"></ion-icon>
                    </button>
                </form>
            </div>
        </div>

        <div class="Mid-Container">List Jasa</div>

        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"><input type="checkbox"></th>
                        <th scope="col">Donatur</th>
                        <th scope="col">Nama Jasa</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tanggal Mulai</th>
                        <th scope="col">Tanggal Berakhir</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($donasiJasa) && $donasiJasa->count() > 0)
                        @foreach ($donasiJasa as $jasa)
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="path-to-profile-picture" alt="profile">
                                        <div class="ms-3">
                                            <p class="mb-0">{{ $jasa->donatur->username ?? 'Tidak ada nama' }}</p>
                                            <p class="text-muted mb-0">{{ $jasa->donatur->email ?? 'Tidak ada email' }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $jasa->nama_jasa }}</td>
                                <td>{{ $jasa->status == 'Diterima' ? 'Approve' : 'Canceled' }}</td>
                                <td>{{ $jasa->jadwal_mulai }}</td>
                                <td>{{ $jasa->jadwal_selesai ?? '-' }}</td>
                                <td>
                                    <button class="icon-btn" title="Delete">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </button>
                                    <button class="icon-btn" title="Edit">
                                        <ion-icon name="brush-outline"></ion-icon>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">Data tidak tersedia</td>
                        </tr>
                    @endif
                </tbody>
            </table>

            <div class="pagination-container">
                @if ($donasiJasa->onFirstPage())
                    <button class="btn btn-secondary" disabled>Previous Page</button>
                @else
                    <a href="{{ $donasiJasa->previousPageUrl() }}" class="btn btn-primary">Previous Page</a>
                @endif
            
                <span>Page {{ $donasiJasa->currentPage() }} of {{ $donasiJasa->lastPage() }}</span>
            
                @if ($donasiJasa->hasMorePages())
                    <a href="{{ $donasiJasa->nextPageUrl() }}" class="btn btn-primary">Next Page</a>
                @else
                    <button class="btn btn-secondary" disabled>Next Page</button>
                @endif
            </div>
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
