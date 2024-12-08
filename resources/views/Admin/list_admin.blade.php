<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Akun Admin</title>
    <link rel="stylesheet" href="/css/style.css">
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
        .icon{
            font-size: 50px;
        }
        
        #searchResults {
            border: 1px solid #ccc;
            padding: 15px;
            margin-top: 10px;
            max-width: 100%;
            max-height: 300px;
            overflow-y: auto;
        }

        .search-result-item {
            margin-bottom: 8px;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            background-color: #f9f9f9;
        }

        .search-input {
            width: 100%;
            max-width: 500px;
            height: 40px;
            padding: 8px;
            margin-bottom: 10px;
        }

    </style>
</head>

<body>
    @include('components.sidebaradmin')
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> <!--Untuk Pop Up-->

    <div class="main">
        <div class="Top-Container">
            <div class="Center-Top">
                <form action="{{ route('admin.search') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" name="query" placeholder="Search Akun Admin" class="form-control" value="{{ request()->query('query') }}">
                        <button type="submit" class="btn btn-primary">
                            <ion-icon name="search-outline"></ion-icon>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="Mid-Container">List Akun Admin</div>

        <div class="container mt-4">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nama Admin</th>
                        <th scope="col">Email</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Status Akun</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($admins as $admin)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <ion-icon name="person-circle-outline" class="icon"></ion-icon>
                                    <div class="ms-3">
                                        <p class="mb-0">{{ $admin->nama_pengurus }}</p>
                                        
                                    </div>
                                </div>
                            </td>
                            <td>{{ $admin->email_admin }}</td>
                            <td>{{ $admin->jabatan }}</td>
                            <td>{{ $admin->status_akun }}</td>
                            <td class="text-center">
                                <button class="btn btn-primary btn-sm edit-btn" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editModal"
                                        data-email="{{ $admin->email_admin }}"
                                        data-nama="{{ $admin->nama_pengurus }}"
                                        data-jabatan="{{ $admin->jabatan }}"
                                        data-status-akun="{{ $admin->status_akun }}">
                                    Edit
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data admin.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
        
        <!-- Modal Edit -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="editForm" method="POST" >
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Admin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="editNamaPengurus" class="form-label">Nama Pengurus</label>
                                <input type="text" id="editNamaPengurus" name="nama_pengurus" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="editEmailAdmin" class="form-label">Email</label>
                                <input type="email" id="editEmailAdmin" name="email_admin" class="form-control" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="editJabatan" class="form-label">Jabatan</label>
                                <select id="editJabatan" name="jabatan" class="form-select">
                                    <option value="Manager">Manager</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="editStatus" class="form-label">Status</label>
                                <select id="editStatus" name="status_akun" class="form-select">
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="editPassword" class="form-label">Password Baru (Opsional)</label>
                                <input type="password" id="editPassword" name="password_admin" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="pagination-container">
            @if ($admins->onFirstPage())
                <button class="btn btn-secondary" disabled>Previous Page</button>
            @else
                <a href="{{ $admins->previousPageUrl() }}" class="btn btn-primary">Previous Page</a>
            @endif

            <span>Page {{ $admins->currentPage() }} of {{ $admins->lastPage() }}</span>

            @if ($admins->hasMorePages())
                <a href="{{ $admins->nextPageUrl() }}" class="btn btn-primary">Next Page</a>
            @else
                <button class="btn btn-secondary" disabled>Next Page</button>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @elseif (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
                showConfirmButton: true
            });
        </script>
    @endif
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Ada kesalahan!',
                html: `
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                `,
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <script>
        const editModal = document.getElementById('editModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const email = button.getAttribute('data-email');
            const nama = button.getAttribute('data-nama');
            const jabatan = button.getAttribute('data-jabatan');
            const status_akun = button.getAttribute('data-status-akun');
    
            editModal.querySelector('#editNamaPengurus').value = nama;
            editModal.querySelector('#editEmailAdmin').value = email;
            editModal.querySelector('#editJabatan').value = jabatan;
            editModal.querySelector('#editStatus').value = status_akun;
    
            const form = editModal.querySelector('#editForm');
            form.action = `/admin/update_admin/${email}`;
        });
    </script>
    <script>
        function searchAdmins() {
            var query = $('#searchQuery').val();
    
            if (query.length === 0) {
                $('#searchResults').html('');
                return;
            }

            $.ajax({
                url: '/admin/search_admins',
                type: 'GET',
                data: { query: query },
                success: function(response) {
                    $('#searchResults').html(response);
                },
                error: function() {
                    $('#searchResults').html('<p class="text-danger">Terjadi kesalahan dalam pencarian.</p>');
                }
            });
        }
    </script>
</body>
</html>