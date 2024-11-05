<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TinyMCE in Laravel</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #F5F5F9;
            font-family: Arial, sans-serif;
        }

        .main {
            width: 100%;
            min-height: 100vh;
            background-color: #F5F5F9;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .Top-Container {
            background-color: #FFFFFF;
            width: 100%;
            height: 80px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .Center-Top {
            border: 3px solid #000000;
            width: 50px;
            height: 50px;
            margin-left: 250px;
        }

        .stripe {
            background-color: #D1B2FF;
            width: 100%;
            height: 25px;
        }

        .Middle-Container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .welcome-card {
            background-color: #FFFFFF;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 90%;
            margin-left: 250px;
            max-width: 900px;
            margin-top: 20px;
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .form-label {
            font-weight: bold;
            color: #333;
        }

        .btn-primary {
            background-color: #D1B2FF;
            border: none;
            width: 100%;
            padding: 10px;
        }

        .btn-primary:hover {
            width: 100%;
            background-color: #D1B2FF;
        }

        @media (min-width: 768px) {
            .welcome-card {
                width: 75%;
            }
        }

        @media (min-width: 1024px) {
            .welcome-card {
                width: 75%;
            }
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
    </style>
</head>

<body>
    @include('components.sidebaradmin')
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <div class="main">
        <div class="Top-Container">
            <div class="Center-Top"></div>
        </div>

        <div class="Middle-Container">
            <div class="stripe"></div>
            <div class="welcome-card">
                <h1>Input Berita</h1>
                @if (session('success'))
                    <!--Alert untuk mempermudah cek-->
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf


                    <div class="mb-3">
                        <label for="nama_berita" class="form-label">Judul Berita</label>
                        <input type="text" class="form-control" id="nama_berita" name="nama_berita"
                            placeholder="Judul Berita" required>
                    </div>

                    <div class="mb-3">
                        <label for="gambar_berita" class="form-label">Gambar Cover</label>
                        <input type="file" class="form-control" id="gambar_berita" name="gambar_berita" required>
                    </div>

                    <div class="mb-3">
                        <label for="isi_berita" class="form-label">Isi Berita</label>
                        <textarea class="form-control" id="isi_berita" name="isi_berita" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script>
    let editorInstance;
    ClassicEditor
        .create(document.querySelector('#isi_berita'))
        .then(editor => {
            editorInstance = editor;
        })
        .catch(error => {
            console.error(error);
        });

    // Synchronize CKEditor content with the original textarea
    document.querySelector('form').addEventListener('submit', (event) => {
        document.querySelector('#isi_berita').value = editorInstance.getData();
    });
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
