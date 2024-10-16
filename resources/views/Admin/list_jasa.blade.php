<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Jasa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8e5e5;
        }

        .sidebar {
            background-color: #2c3e50;
            color: white;
            height: 100vh;
            padding-top: 20px;
        }

        .sidebar .nav-link {
            color: white;
            padding: 10px 15px;
        }

        .sidebar .nav-link:hover {
            background-color: #34495e;
        }

        .main-content {
            padding: 20px;
        }

        .table-card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .table th {
            background-color: #f0f0f0;
        }

        .actions {
            display: flex;
            justify-content: center;
        }

        .actions .btn {
            margin-right: 5px;
        }

        .pagination {
            display: flex;
            justify-content: space-between;
        }

        .header {
            background-color: #e5d1f2;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 2rem;
            font-weight: bold;
        }

        .pagination-nav {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination-nav button {
            margin: 0 10px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                            <a class="nav-link active" href="#">
                                Admin Page
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#">
                                Donasi
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#">
                                Data Anak
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#">
                                Berita
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-10 ms-sm-auto px-md-4 main-content">
                <div class="header">
                    <h1>LIST Jasa</h1>
                </div>
                <div class="table-card">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Donatur</th>
                                <th scope="col">Nama Jasa</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tanggal Mulai</th>
                                <th scope="col">Tanggal Berakhir</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John Doe<br>john.doe@gmail.com</td>
                                <td>Nama Kegiatan</td>
                                <td>Approve</td>
                                <td>20-10-2024</td>
                                <td>22-10-2024</td>
                                <td class="actions">
                                    <button class="btn btn-outline-secondary btn-sm">
                                        <i class="bi bi-pencil"></i> Edit
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>John Doe<br>john.doe@gmail.com</td>
                                <td>Nama Kegiatan</td>
                                <td>Pending</td>
                                <td>31-11-2024</td>
                                <td>2-11-2024</td>
                                <td class="actions">
                                    <button class="btn btn-outline-secondary btn-sm">
                                        <i class="bi bi-pencil"></i> Edit
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>

                <div class="pagination-nav">
                    <button class="btn btn-secondary">Previous</button>
                    <span>Page 1 of 10</span>
                    <button class="btn btn-secondary">Next</button>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
