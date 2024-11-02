<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>List Donasi Barang - Admin</title>
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

    <style>
        body {
            background-color: #f8e5e5;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        h1.page-title {
            background-color: #e6e6fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
        }

        .table-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .table th {
            background-color: #f8f9fa;
            vertical-align: middle;
        }

        .table td {
            vertical-align: middle;
        }

        .donatur-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .donatur-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        /* Modal styles */
        .modal-content {
            border-radius: 15px;
        }

        .modal-header {
            background-color: #e6e6fa;
            border-radius: 15px 15px 0 0;
            padding: 15px 20px;
        }

        .modal-body {
            padding: 20px;
        }

        .close-button {
            position: absolute;
            right: 15px;
            top: 15px;
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .modal-footer {
            justify-content: flex-end;
            gap: 10px;
            padding: 15px 20px;
        }

        .btn-reject {
            background-color: #dc3545;
            color: white;
        }

        .btn-approve {
            background-color: #0d6efd;
            color: white;
        }
    </style>
</head>
<body>
    @include('components.sidebaradmin')

    <div class="main-content">
        <h1 class="page-title">LIST Donasi Barang</h1>

        <div class="table-container">
            <div class="row mb-3">
                <div class="col">
                    <button class="btn btn-primary">Approve</button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" class="form-check-input" id="selectAll"></th>
                            <th>Donatur</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(isset($donasi_barang) && count($donasi_barang) > 0)
                        @foreach($donasi_barang as $donasi)
                        <tr>
                            <td><input type="checkbox" class="form-check-input"></td>
                            <td>
                                <div class="donatur-info">
                                    <img src="{{ asset('storage/uploads/default.png') }}" alt="Profile">
                                    <div>
                                        <div>{{ $donasi->nama_asli }}</div>
                                        <small>{{ $donasi->email }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $donasi->nama_barang }}</td>
                            <td>{{ $donasi->jumlah_barang }} Buah</td>
                            <td>{{ $donasi->status }}</td>
                            <td>{{ $donasi->tanggal_verifikasi_barang }}</td>
                            <td>
                                <button class="btn btn-link btn-detail" 
                                        data-id="{{ $donasi->id_donasi_barang }}"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#detailModal">
                                    <i class="bi bi-file-text"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data donasi</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Detail -->
    <div class="modal fade" id="detailModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Donasi Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Donatur</label>
                                <input type="text" class="form-control" id="detailDonatur" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Verifikasi</label>
                                <div class="border p-2">
                                    <img id="detailVerifikasi" src="" alt="Bukti Donasi" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tanggal</label>
                                <input type="text" class="form-control" id="detailTanggal" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" id="detailNamaBarang" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jumlah Barang</label>
                                <input type="text" class="form-control" id="detailJumlahBarang" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="text-end mt-3">
                        <button type="button" class="btn btn-reject" id="btnReject">Reject</button>
                        <button type="button" class="btn btn-approve" id="btnApprove">Approve</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Detail Modal Handler
        $('.btn-detail').click(function() {
            const id = $(this).data('id');
            
            $.ajax({
                url: `/admin/donasi-barang/${id}/detail`,
                method: 'GET',
                success: function(response) {
                    $('#detailDonatur').val(response.donatur);
                    $('#detailTanggal').val(response.tanggal);
                    $('#detailNamaBarang').val(response.nama_barang);
                    $('#detailJumlahBarang').val(response.jumlah + ' Buah');
                    $('#detailVerifikasi').attr('src', response.bukti_foto);
                    
                    $('#btnApprove, #btnReject').data('id', id);
                }
            });
        });

        // Approve/Reject Handlers
        $('#btnApprove').click(function() {
            const id = $(this).data('id');
            approveReject(id, 'Diterima');
        });

        $('#btnReject').click(function() {
            const id = $(this).data('id');
            approveReject(id, 'Dibatalkan');
        });

        function approveReject(id, status) {
            $.ajax({
                url: `/admin/donasi-barang/${id}/${status.toLowerCase()}`,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function() {
                    $('#detailModal').modal('hide');
                    location.reload();
                }
            });
        }
    </script>
</body>
</html>