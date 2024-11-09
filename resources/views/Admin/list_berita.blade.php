<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Berita</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
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
    @include('components.sidebaradmin')
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <div class="main">
        <div class="Top-Container">
            <div class="Center-Top">
                <form action="/" method="GET">
                    <input type="text" name="query" placeholder="Search Berita" class="form-control">
                    <button type="submit" class="search-button">
                        <ion-icon name="search-outline"></ion-icon>
                    </button>
                </form>
            </div>
        </div>

        <div class="Mid-Container">List Berita</div>

        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Admin</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($berita) && $berita->count() > 0)
                        @foreach ($berita as $unit)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <ion-icon name="person-circle-outline" class="icon"></ion-icon>
                                        <div class="ms-3">
                                            <p class="mb-0">{{ $unit->admin->nama_pengurus ?? 'Terjadi Kesalahan' }}
                                            </p>
                                            <p class="text-muted mb-0">{{ $unit->email_admin }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $unit->nama_berita }}</td>
                                <td>{{ $unit->tgl_upload }}</td>
                                <td>
                                    @if ($unit->status)
                                        Ditampilkan
                                    @else
                                        Disembunyikan
                                    @endif
                                </td>
                                <td>
                                    <button class="icon-btn delete-btn" title="Delete" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal-{{ $unit->id_berita }}">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </button>
                                    <button class="icon-btn view-details-btn" title="Edit" data-bs-toggle="modal"
                                        data-bs-target="#editModal-{{ $unit->id_berita }}">
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

            <!-- Pagination -->
            <div class="pagination-container">
                @if ($berita->onFirstPage())
                    <button class="btn btn-secondary" disabled>Previous Page</button>
                @else
                    <a href="{{ $berita->previousPageUrl() }}" class="btn btn-primary">Previous Page</a>
                @endif

                <span>Page {{ $berita->currentPage() }} of {{ $berita->lastPage() }}</span>

                @if ($berita->hasMorePages())
                    <a href="{{ $berita->nextPageUrl() }}" class="btn btn-primary">Next Page</a>
                @else
                    <button class="btn btn-secondary" disabled>Next Page</button>
                @endif
            </div>

            <!-- Modal Delete -->
            <div class="modal fade" id="deleteModal-{{ $unit->id_berita }}" tabindex="-1"
                aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Hapus Berita</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus berita ini?
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('berita.destroy', $unit->id_berita) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Edit -->
            <div class="modal fade" id="editModal-{{ $unit->id_berita }}" tabindex="-1"
                aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Berita</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('berita.update', $unit->id_berita) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="nama_berita" class="form-label">Judul Berita</label>
                                    <input type="text" class="form-control" name="nama_berita"
                                        value="{{ $unit->nama_berita }}">
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="1" {{ $unit->status ? 'selected' : '' }}>Ditampilkan</option>
                                        <option value="0" {{ !$unit->status ? 'selected' : '' }}>Disembunyikan</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="isi_berita" class="form-label">Isi Berita</label>
                                    <textarea class="form-control ckeditor" name="isi_berita">{{ $unit->isi_berita }}</textarea>
                                </div>


                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.querySelectorAll('.ckeditor').forEach(editorEl => {
                    ClassicEditor
                        .create(editorEl)
                        .catch(error => {
                            console.error(error);
                        });
                });
            </script>

        </div>
    </div>
</body>

</html>
