<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Donasi Uang</title>
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

        .icon {
            font-size: 50px;
        }
    </style>
</head>

<body>
    <!-- Sidebar Component -->
    @include('components.sidebaradmin')
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


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

        <div class="Mid-Container">List Donasi Uang</div>

        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Donatur</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tanggal Penginputan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($donasiUang) && $donasiUang->count() > 0)
                        @foreach ($donasiUang as $uang)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <ion-icon name="person-circle-outline" class="icon"></ion-icon>
                                        <div class="ms-3">
                                            <p class="mb-0">{{ $uang->donatur->username ?? 'Anonim' }}</p>
                                            <p class="text-muted mb-0">{{ $uang->donatur->email ?? '' }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $uang->status }}</td>
                                <td>{{ $uang->tanggal_donasi_uang }}</td>
                                <td>
                                    <button class="icon-btn delete-btn" title="Delete"
                                        data-id="{{ $uang->id_donasi_uang }}"
                                        tanggal_uang="{{ $uang->tanggal_donasi_uang }}">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </button>
                                    <button class="icon-btn view-details-btn" title="Edit"
                                        data-id="{{ $uang->id_donasi_uang }}" data-status="{{ $uang->status }}"
                                        data-bukti="{{ asset('storage/' . $uang->bukti_transfer) }}">
                                        <ion-icon name="brush-outline"></ion-icon>
                                    </button>

                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">Data tidak tersedia</td>
                        </tr>
                    @endif
                </tbody>
            </table>

            <!-- Paginate -->
            <div class="pagination-container">
                @if ($donasiUang->onFirstPage())
                    <button class="btn btn-secondary" disabled>Previous Page</button>
                @else
                    <a href="{{ $donasiUang->previousPageUrl() }}" class="btn btn-primary">Previous Page</a>
                @endif

                <span>Page {{ $donasiUang->currentPage() }} of {{ $donasiUang->lastPage() }}</span>

                @if ($donasiUang->hasMorePages())
                    <a href="{{ $donasiUang->nextPageUrl() }}" class="btn btn-primary">Next Page</a>
                @else
                    <button class="btn btn-secondary" disabled>Next Page</button>
                @endif
            </div>

            <!-- Pop Up Konfirmasi Delete -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Warning</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus jasa <strong id="delete_tanggal"></strong>?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" id="confirmDeleteButton" class="btn btn-danger">Konfirmasi</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Script untuk Pop Up dan Hapus Data -->
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const deleteModal = new bootstrap.Modal(document.getElementById("deleteModal"));
                    let currentDeleteId = null;

                    // Event listener untuk tombol delete
                    document.querySelectorAll(".delete-btn").forEach(button => {
                        button.addEventListener("click", function() {
                            currentDeleteId = this.getAttribute("data-id");
                            const Tanggal_Uang = this.getAttribute("tanggal_uang");

                            // Tampilkan nama jasa di modal
                            document.getElementById("delete_tanggal").textContent = Tanggal_Uang;
                            deleteModal.show();
                        });
                    });

                    // Konfirmasi penghapusan data
                    document.getElementById("confirmDeleteButton").addEventListener("click", function() {
                        if (currentDeleteId) {
                            fetch(`/donasi_jasa/${currentDeleteId}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    alert(data.message || "Data berhasil dihapus");
                                    deleteModal.hide();
                                    location.reload();
                                })
                                .catch(error => console.error("Error deleting data:", error));
                        }
                    });
                });
            </script>

            <!--Edit-->

            <!-- Pop Up Edit Data -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Donasi Uang</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center mb-3">
                                <img id="editBuktiTransferImage" src="" alt="Bukti Transfer" class="img-fluid"
                                    style="max-height: 200px;">
                            </div>

                            <form id="editForm">
                                <input type="hidden" id="editIdDonasiUang" name="id_donasi_uang">

                                <div class="mb-3">
                                    <label for="editStatus" class="form-label">Status</label>
                                    <select class="form-control" id="editStatus" name="status">
                                        <option value="Diterima">Diterima</option>
                                        <option value="Dibatalkan">Dibatalkan</option>
                                        <option value="Diproses">Diproses</option>
                                    </select>
                                </div>

                                <button type="button" id="saveEditButton" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const editModal = new bootstrap.Modal(document.getElementById("editModal"));
                    let currentEditId = null;

                    document.querySelectorAll(".view-details-btn").forEach(button => {
                        button.addEventListener("click", function() {
                            currentEditId = this.getAttribute("data-id");
                            const status = this.getAttribute("data-status");
                            const buktiTransferUrl = this.getAttribute("data-bukti");

                            // Set gambar bukti transfer di dalam modal
                            document.getElementById("editBuktiTransferImage").src = buktiTransferUrl;

                            // Set status saat ini
                            document.getElementById("editStatus").value = status;

                            // Set ID donasi uang
                            document.getElementById("editIdDonasiUang").value = currentEditId;

                            editModal.show();
                        });
                    });

                    document.getElementById("saveEditButton").addEventListener("click", function() {
                        const formData = new FormData(document.getElementById("editForm"));
                        fetch(`/list_uang/${currentEditId}`, {
                                method: 'PUT',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: formData
                            })
                            .then(response => response.json())
                            .then(data => {
                                alert(data.message || "Data berhasil diperbarui");
                                editModal.hide();
                                location.reload();
                            })
                            .catch(error => console.error("Error updating data:", error));
                    });
                });
            </script>
        </div>
    </div>
</body>

</html>
