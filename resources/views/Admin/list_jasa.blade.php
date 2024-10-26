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

        .Center-Top {
            Font-size:20px;
        }

        .Mid-Container {
            background-color: #D1B2FF;
            width: 100%;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .Center-Mid {
            font-size: 36px;
            color: #fff;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .table img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .icon-btn {
            border: none;
            background: none;
            width: 50px;
            height: 50px;
            font-size: 18px;
        }
        button:hover {
            color: white;
            width: 50px;
            background-color: #7243b7;
        }
        .pagination-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .search-button{
            width: 50px;
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
                <form action="/search" method="GET" class="d-flex align-items-center">
                    <input type="text" name="query" placeholder="Search Jasa" class="form-control me-2">
                    <button type="submit" class="search-button">
                        <ion-icon name="search-outline"></ion-icon>
                    </button>
                </form>
            </div>
        </div>
        

        <div class="Mid-Container">
            <div class="Center-Mid">LIST Jasa</div>
        </div>

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
                    <!-- Data Dinamis per 10/10-->
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="path-to-profile-picture" alt="profile">
                                <div class="ms-3">
                                    <p class="mb-0">Nama Donatur</p>
                                    <p class="text-muted mb-0">Email admin</p>
                                </div>
                            </div>
                        </td>
                        <td>Nama Jasa</td>
                        <td>Status Jasa</td>
                        <td>Jadwal Mulai</td>
                        <td>Jadwal Selesai</td>
                        <td>
                            <button class="icon-btn">
                                <ion-icon name="trash-outline">
                                    Delete
                                </ion-icon>
                            </button>
                            <button class="icon-btn">
                                <ion-icon name="brush-outline">
                                Edit
                                </ion-icon>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="pagination-container">
                <button class="btn btn-primary">Previous</button>
                <p>Page 1 of 10</p>
                <button class="btn btn-primary">Next</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
