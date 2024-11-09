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
            background-color: #F5F5F9;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        h1.page-title {
            background-color: #9f5ffe; /* Background color */
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
            color: white; /* Change this to your preferred color */
        }


        .table-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            max-width: 800px;
            margin: 0 auto;
            text-align: center; /* Center align contents inside the container */
        }

        .table {
            display: inline-table; /* Make the table centered */
            width: auto; /* Adjust width to content */
        }

        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }

        .aksi-column .aksi-header {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        /* Adjust the width of the Approve button */
        .btn-approve-action {
            padding: 4px 10px; /* Adjust padding as needed */
            font-size: 0.875rem; /* Smaller font size */
            width: 80px; /* Set a fixed width to make the button narrower */
            min-width: 100px; /* Ensure minimum width */
            max-width: 100px; /* Ensure maximum width */
            line-height: 2;
            font-weight: 500;
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

        .sidebar ul li:last-child {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 60px;
        }
    </style>
</head>
<body>
    @include('components.sidebaradmin')

    <div class="main-content" style="margin-left: 0;width: 100%">
        <h1 class="page-title">LIST Donasi Barang</h1>

        <!-- Table and Button in Header -->
        <div class="table-container">

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
                            <th class="aksi-column">
                                <div class="aksi-header">
                                    Metode Pengiriman
                                    <button class="btn btn-primary btn-approve-action" id="bulkApprove">Approve</button>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="donationList">
                        @if(isset($donasi_barang) && count($donasi_barang) > 0)
                            @foreach($donasi_barang as $donasi)
                            <tr>
                                <td><input type="checkbox" class="form-check-input"></td>
                                <td>
                                    <div class="donatur-info">
                                        <!-- <img src="{{ asset("storage/$donasi->bukti_foto") }}" alt="Profile"> -->
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
                                <td class="aksi-column">
                                    {{ $donasi->metode_pengiriman }}
                                    <button class="btn-detail">Detail</button>
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

    <!-- Donation Detail Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1">
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

    <!-- jQuery and AJAX Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Load donations dynamically
        function loadDonations() {
            $.ajax({
                url: '/admin/donasi-barang',  // Adjust the endpoint based on your route
                method: 'GET',
                success: function(response) {
                    $('#donationList').html(''); // Clear existing rows
                    response.donasi_barang.forEach(function(donasi) {
                        $('#donationList').append(`
                            <tr>
                                <td><input type="checkbox" class="form-check-input"></td>
                                <td>
                                    <div class="donatur-info">
                                        <img src="${donasi.profile_image}" alt="Profile" style="width: 40px; height: 40px; border-radius: 50%;">
                                        <div>
                                            <div>${donasi.nama_asli}</div>
                                            <small>${donasi.email}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>${donasi.nama_barang}</td>
                                <td>${donasi.jumlah_barang} Buah</td>
                                <td>${donasi.status}</td>
                                <td>${donasi.tanggal_verifikasi_barang}</td>
                                <td class="aksi-column">${donasi.metode_pengiriman}</td>
                            </tr>
                        `);
                    });
                }
            });
        }

        // Load donations on page load
        $(document).ready(function() {
            // loadDonations();
        });

        // Show details in the modal
        $(document).on('click', '.btn-detail', function() {
            $('#detailModal').modal('show');
            // const id = $(this).data('id');
            // $.ajax({
            //     url: `/admin/donasi-barang/${id}/detail`,
            //     method: 'GET',
            //     success: function(response) {
            //         $('#detailDonatur').val(response.donatur);
            //         $('#detailTanggal').val(response.tanggal);
            //         $('#detailNamaBarang').val(response.nama_barang);
            //         $('#detailJumlahBarang').val(response.jumlah + ' Buah');
            //         $('#detailVerifikasi').attr('src', response.bukti_foto);

            //         $('#btnApprove, #btnReject').data('id', id);
            //     }
            // });
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
                    loadDonations(); // Reload donations after approval/rejection
                }
            });
        }
    </script>
</body>
</html>
