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
            margin-left: 250px;
            background-color: #F5F5F9;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #F5F5F9;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
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
            width: 30px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.2em;
            border: none;
            background: none;
            color: #000;
            transition: color 0.2s ease;
        }

        .icon-btn:hover {
            color: #5628a5;
            font-size: 1.2em;
            width: 30px;
            height: 30px;
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
            margin: 20px;
            transition: background-color 0.2s ease;
        }

        .btn-primary:hover {
            background-color: #5628a5;
            border-color: #5628a5;
        }

        .btn-secondary {
            margin: 20px;
        }
        .icon{
            font-size: 50px;
        }
    </style>
</head>

<body>
    @include('components.sidebardonatur_setting')
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
                                <td>{{ $jasa->nama_jasa }}</td>
                                <td>{{ $jasa->status == 'Diterima' ? 'Approve' : 'Canceled' }}</td>
                                <td>{{ $jasa->jadwal_mulai }}</td>
                                <td>{{ $jasa->jadwal_selesai ?? '-' }}</td>
                                <td>
                                    <button class="icon-btn view-details-btn" title="Detail Jasa"
                                        data-id="{{ $jasa->id_donasi_jasa }}">
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

            <!-- Pop Up Detail -->
            <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalNamaJasa">Nama Jasa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="modalDeskripsiJasa" class="form-label">Deskripsi Jasa</label>
                                    <textarea id="modalDeskripsiJasa" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="modalTanggalMulai" class="form-label">Tanggal Mulai</label>
                                    <input type="date" id="modalTanggalMulai" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="modalTanggalSelesai" class="form-label">Tanggal Berakhir</label>
                                    <input type="date" id="modalTanggalSelesai" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="modalStatus" class="form-label">Status</label>
                                    <select id="modalStatus" class="form-select">
                                        <option value="Diterima">Diterima</option>
                                        <option value="Dibatalkan">Dibatalkan</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batalkan</button>
                            <button type="button" id="confirmButton" class="btn btn-primary">Konfirmasi</button>
                        </div>
                    </div>
                </div>
            </div>

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
    
    <!-- Script Detail -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const modal = new bootstrap.Modal(document.getElementById("detailModal"));
            let currentId = null;  // Variabel global untuk menyimpan ID yang sedang diedit
    
            document.querySelectorAll(".view-details-btn").forEach(button => {
                button.addEventListener("click", function() {
                    currentId = this.getAttribute("data-id"); // Simpan ID ke variabel global
                    console.log("Editing ID ", currentId);
    
                    fetch(`/donasi_jasa/${currentId}`)
                        .then(response => response.json())
                        .then(data => {
                            // Mengisi data modal
                            document.getElementById("modalNamaJasa").textContent = data.nama_jasa;
                            document.getElementById("modalDeskripsiJasa").value = data.deskripsi_jasa;
                            document.getElementById("modalTanggalMulai").value = data.jadwal_mulai;
                            document.getElementById("modalTanggalSelesai").value = data.jadwal_selesai || '-';
                            document.getElementById("modalStatus").value = data.status;

                            document.getElementById("modalDeskripsiJasa").setAttribute("readonly", true);
                            document.getElementById("modalTanggalMulai").setAttribute("readonly", true);
                            document.getElementById("modalTanggalSelesai").setAttribute("readonly", true);
                            document.getElementById("modalStatus").setAttribute("disabled", true);
    
                            // Menampilkan modal
                            modal.show();
                        })
                        .catch(error => console.error("Error fetching data:", error));
                });
            });
        });
    </script>
    
    

</body>

</html>