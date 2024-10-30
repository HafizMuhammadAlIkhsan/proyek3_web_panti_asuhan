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
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

    <style>
        body {
            background-color: #f8e5e5;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background: white;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.05);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 30px;
        }

        .logo img {
            width: 32px;
            height: 32px;
        }

        .logo span {
            font-weight: 600;
            font-size: 18px;
            color: #333;
        }

        .menu-item {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu-item li {
            margin-bottom: 15px;
        }

        .menu-item a {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            text-decoration: none;
            color: #6B7280;
            border-radius: 8px;
            transition: all 0.3s;
            gap: 12px;
        }

        .menu-item a:hover, 
        .menu-item a.active {
            background-color: #F3F4F6;
            color: #6366F1;
        }

        .menu-item ion-icon {
            font-size: 20px;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table {
            margin-bottom: 0;
        }

        .table th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
            white-space: nowrap;
        }

        .table td {
            vertical-align: middle;
        }

        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 500;
        }

        .btn-link {
            color: #6c757d;
            padding: 4px;
            text-decoration: none;
        }

        .btn-link:hover {
            color: #0d6efd;
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
            object-fit: cover;
        }

        .pagination-info {
            font-size: 14px;
            color: #6c757d;
        }

        .status-diproses {
            background-color: #ffc107;
            color: #000;
        }

        .status-confirmed {
            background-color: #198754;
            color: #fff;
        }

        .status-diterima {
            background-color: #0dcaf0;
            color: #000;
        }

        .modal-content {
            border-radius: 15px;
        }

        .modal-header {
            background-color: #f8f9fa;
            border-radius: 15px 15px 0 0;
        }

        .form-control {
            background-color: #f8f9fa;
        }

        .form-control:read-only {
            background-color: #f8f9fa;
        }

        #detailVerifikasi {
            max-height: 200px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        @include('components.sidebaradmin')

        <div class="main-content">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h2">LIST Donasi Barang</h1>
                    <button class="btn btn-primary">Approve</button>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" class="form-check-input" id="selectAll">
                                        </th>
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
                                            <td>
                                                <input type="checkbox" class="form-check-input item-checkbox">
                                            </td>
                                            <td>
                                                <div class="donatur-info">
                                                    <img src="{{ asset('storage/' . $donasi->user->photo) }}" alt="Profile">
                                                    <div>
                                                        <div class="fw-medium">{{ $donasi->user->name }}</div>
                                                        <small class="text-muted">{{ $donasi->user->email }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $donasi->nama_barang }}</td>
                                            <td>{{ $donasi->jumlah }} Buah</td>
                                            <td>
                                                <span class="badge status-{{ strtolower($donasi->status) }}">
                                                    {{ $donasi->status }}
                                                </span>
                                            </td>
                                            <td>{{ $donasi->tanggal }}</td>
                                            <td>
                                                <button class="btn btn-link btn-detail" 
                                                        data-id="{{ $donasi->id }}" 
                                                        title="Detail">
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

                        @if(isset($donasi_barang) && count($donasi_barang) > 0)
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="pagination-info">
                                Showing {{ $donasi_barang->firstItem() }} to {{ $donasi_barang->lastItem() }}
                                of {{ $donasi_barang->total() }} entries
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                {{ $donasi_barang->links() }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail -->
    <div class="modal fade" id="detailDonasiModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Donasi Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                <div class="border rounded p-2" style="min-height: 200px">
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
                        <button type="button" class="btn btn-danger me-2" id="btnReject">Reject</button>
                        <button type="button" class="btn btn-primary" id="btnApprove">Approve</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Select All Checkbox
        document.getElementById('selectAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.item-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        // Individual Checkbox Handler
        document.querySelectorAll('.item-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const selectAll = document.getElementById('selectAll');
                const allCheckboxes = document.querySelectorAll('.item-checkbox');
                const checkedCount = document.querySelectorAll('.item-checkbox:checked').length;
                
                selectAll.checked = checkedCount === allCheckboxes.length;
                selectAll.indeterminate = checkedCount > 0 && checkedCount < allCheckboxes.length;
            });
        });

        // Show Detail Modal
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
                    
                    $('#btnApprove').data('id', id);
                    $('#btnReject').data('id', id);
                    
                    $('#detailDonasiModal').modal('show');
                },
                error: function(xhr) {
                    alert('Terjadi kesalahan saat mengambil data');
                }
            });
        });

        // Approve Handler
        $('#btnApprove').click(function() {
            const id = $(this).data('id');
            $.ajax({
                url: `/admin/donasi-barang/${id}/approve`,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#detailDonasiModal').modal('hide');
                    location.reload();
                },
                error: function(xhr) {
                    alert('Terjadi kesalahan saat approve donasi');
                }
            });
        });

        // Reject Handler
        $('#btnReject').click(function() {
            const id = $(this).data('id');
            $.ajax({
                url: `/admin/donasi-barang/${id}/reject`,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#detailDonasiModal').modal('hide');
                    location.reload();
                },
                error: function(xhr) {
                    alert('Terjadi kesalahan saat reject donasi');
                }
            });
        });
    </script>
</body>
</html>