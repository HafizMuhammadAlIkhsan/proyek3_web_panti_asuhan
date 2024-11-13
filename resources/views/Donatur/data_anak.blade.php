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
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <style>
        /* Styling untuk tampilan yang menyerupai gambar */
        body {
            background-color: #F5F5F9;
            margin: 0;
            padding: 0;
            font-family: 'Outfit', sans-serif;
        }

        .header {
            background-color: #d6bcfa;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .table-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }

        .table th {
            font-weight: 600;
            color: #333;
            text-align: center;
        }

        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .pagination-container {
            display: flex;
            justify-content: space-between;
            padding: 10px;
        }

        .btn {
            border-radius: 4px;
        }

        .btn-primary {
            background-color: #6b46c1;
            border-color: #6b46c1;
        }

        .btn-primary:hover {
            background-color: #553c9a;
            border-color: #553c9a;
        }

        .btn-secondary {
            background-color: #e2e8f0;
            color: #4a5568;
        }

        .btn-secondary:hover {
            background-color: #cbd5e0;
        }

        .btn-action {
            display: flex;
            gap: 5px;
            justify-content: center;
        }
    </style>
</head>
<body>
    @include("components.sidebardonatur")
    <div class="table-container">

        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Anak</th>
                    <th>Jenis Kelamin</th>
                    <th>Pendidikan</th>
                    <th>Status Orang Tua</th>
                    <th>Tanggal Lahir</th>
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
                </tr>
                <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
        
        <div class="pagination-container">
            <!-- Tombol Previous Page -->
            @if ($data_anak->onFirstPage())
                <button class="btn btn-secondary" disabled>Previous Page</button>
            @else
                <a href="{{ $data_anak->previousPageUrl() }}" class="btn btn-secondary">Previous Page</a>
            @endif

            <span>Page {{ $data_anak->currentPage() }} of {{ $data_anak->lastPage() }}</span>

            <!-- Tombol Next Page -->
            @if ($data_anak->hasMorePages())
                <a href="{{ $data_anak->nextPageUrl() }}" class="btn btn-secondary">Next Page</a>
            @else
                <button class="btn btn-secondary" disabled>Next Page</button>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.all.min.js"></script>
</body>
</html>
