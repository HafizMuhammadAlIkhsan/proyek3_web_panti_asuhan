<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Barang</title>
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
    @include('components.sidebaradmin')
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> <!--Untuk Pop Up-->

    <div class="main">
        <div class="Mid-Container">List Barang</div>

        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Donatur</th>
                        <th scope="col">Penanggung Jawab</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tanggal Verifikasi</th>
                        <th scope="col">Tanggal Berakhir</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($donasiBarang) && $donasiBarang->count() > 0)
                        @foreach ($donasiBarang as $jasa)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <ion-icon name="person-circle-outline" class="icon"></ion-icon>
                                        <div class="ms-3">
                                            <p class="mb-0">{{ $jasa->donatur->username ?? 'Tidak ada nama' }}</p>
                                            <p class="text-muted mb-0">{{ $jasa->donatur->email ?? 'Tidak ada email' }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <ion-icon name="person-circle-outline" class="icon"></ion-icon>
                                        <div class="ms-3">
                                            <p class="mb-0">{{ $jasa->admin->nama_pengurus ?? 'Tidak ada nama' }}</p>
                                            <p class="text-muted mb-0">
                                                {{ $jasa->admin->email_admin ?? 'Tidak ada email' }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $jasa->nama_barang }}</td>
                                <td>{{ $jasa->status }}</td>
                                <td>{{ $jasa->tanggal_verifikasi_barang }}</td>
                                <td>{{ $jasa->metode_pengiriman ?? 'Jasa Pengiriman' }}</td>
                                <td>
                                    <button class="icon-btn delete-btn" title="Delete"
                                        data-id="{{ $jasa->id_donasi_barang }}"
                                        data-nama-barang="{{ $jasa->nama_barang }}">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </button>
                                    <button class="icon-btn view-details-btn" title="Edit"
                                        data-id="{{ $jasa->id_donasi_barang }}">
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

            <!-- Pop Up Edit -->
            <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-center">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalNamaBarang">Nama Barang</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="donatur" class="form-label">Donatur</label>
                                        <input type="text" id="donatur" placeholder="Ex: Anonymous"
                                            class="form-control" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-label">Verifikasi</div>
                                        <img id="image-preview" style="width: 250px;height: 250px;object-fit:cover;">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="modalStatus" class="form-label">Status</label>
                                        <select id="modalStatus" class="form-select">
                                            <option value="Diproses">Diproses</option>
                                            <option value="Menunggu pengiriman">Menunggu pengiriman</option>
                                            <option value="Diterima">Diterima</option>
                                            <option value="Dibatalkan">Dibatalkan</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="itemName">Nama Barang</label>
                                        <input class="form-control" type="text" id="itemName"
                                            placeholder="Ex: Buku/Pensil" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="itemQuantity">Jumlah Barang</label>
                                        <input class="form-control" type="text" id="itemQuantity"
                                            placeholder="Ex: 8 Buah/1 Lusin" disabled>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batalkan</button>
                            <button type="button" id="confirmButton"
                                class="btn bg-primary text-white">Konfirmasi</button>
                        </div>
                    </div>
                </div>
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
                            <p>Apakah Anda yakin ingin menghapus donasi barang <strong id="deleteNamaBarang"></strong>?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" id="confirmDeleteButton"
                                class="btn btn-danger">Konfirmasi</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pagination-container">
                @if ($donasiBarang->onFirstPage())
                    <button class="btn btn-secondary" disabled>Previous Page</button>
                @else
                    <a href="{{ $donasiBarang->previousPageUrl() }}" class="btn btn-primary">Previous Page</a>
                @endif

                <span>Page {{ $donasiBarang->currentPage() }} of {{ $donasiBarang->lastPage() }}</span>

                @if ($donasiBarang->hasMorePages())
                    <a href="{{ $donasiBarang->nextPageUrl() }}" class="btn btn-primary">Next Page</a>
                @else
                    <button class="btn btn-secondary" disabled>Next Page</button>
                @endif
            </div>

        </div>
    </div>


    <script>
        const modal = new bootstrap.Modal(document.getElementById("detailModal"));
        let currentId = null; // Variabel global untuk menyimpan ID yang sedang diedit

        document.querySelectorAll(".view-details-btn").forEach(button => {
            button.addEventListener("click", function() {
                currentId = this.getAttribute("data-id"); // Simpan ID ke variabel global
                console.log("Editing ID ", currentId);

                fetch(`/donasi_barang/${currentId}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);

                        document.getElementById('image-preview').src = data.bukti_foto
                        // Mengisi data modal
                        document.getElementById("modalNamaBarang").textContent = data.nama_barang;
                        document.getElementById("donatur").value = data.donatur;
                        // document.getElementById('date').value = data.tanggal
                        document.getElementById('itemName').value = data.nama_barang
                        document.getElementById("itemQuantity").value = data.jumlah;
                        // status
                        const modalStatus = document.getElementById("modalStatus");
                        modalStatus.value = data.status;
                        modalStatus.dispatchEvent(new Event('change'));

                        // Menampilkan modal
                        modal.show();
                    })
                    .catch(error => console.error("Error fetching data:", error));
            });
        });

        // Tombol Konfirmasi
        document.getElementById("confirmButton").addEventListener("click", function() {
            const status = document.getElementById("modalStatus").value;
            console.log("Editing ID konfirm:", currentId);

            fetch(`/donasi_barang/${currentId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        status: status,
                    })
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    modal.hide();
                    location.reload();
                })
                .catch(error => console.error("Error updating data:", error));
        });
    </script>

    <script>
        // modal hapus barang
        const deleteModal = new bootstrap.Modal(document.getElementById("deleteModal"));
        let currentDeleteId = null;
        document.querySelectorAll(".delete-btn").forEach(button => {
            button.addEventListener("click", function() {
                currentDeleteId = this.getAttribute("data-id");
                const namaBarang = this.getAttribute("data-nama-barang");

                // Tampilkan nama barang di modal
                document.getElementById("deleteNamaBarang").textContent = namaBarang;
                deleteModal.show();
            });
        });

        // ajax hapus barang
        document.getElementById("confirmDeleteButton").addEventListener("click", function() {
            if (currentDeleteId) {
                fetch(`/donasi_barang/${currentDeleteId}`, {
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
    </script>
</body>

</html>
