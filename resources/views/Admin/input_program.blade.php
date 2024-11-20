<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Input Program Panti</title>

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
            background-color: #5628a5;
            width: 100%;
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
                <h1>Input Program Panti</h1>
                @if (session('success'))
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

                <form action="{{ route('program.insert') }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf

                    <div class="mb-3">
                        <label for="nama_program" class="form-label">Nama Program</label>
                        <input type="text" class="form-control" id="nama_program" name="nama_program" placeholder="Nama Program" required>
                    </div>

                    <div class="mb-3">
                        <label for="gambar_program" class="form-label">Gambar Program</label>
                        <input type="file" class="form-control" id="gambar_program" name="gambar_program" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi_program" class="form-label">Deskripsi Program</label>
                        <textarea class="form-control" id="deskripsi_program" name="deskripsi_program" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="dana_program" class="form-label">Dana Program</label>
                        <input type="number" class="form-control" id="dana_program" name="dana_program" placeholder="Dana yang Dibutuhkan" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        let editorInstance;
        ClassicEditor
            .create(document.querySelector('#deskripsi_program'))
            .then(editor => {
                editorInstance = editor;
            })
            .catch(error => {
                console.error(error);
            });

        document.querySelector('form').addEventListener('submit', (event) => {
            document.querySelector('#deskripsi_program').value = editorInstance.getData();
        });
    </script>
</body>

</html>
