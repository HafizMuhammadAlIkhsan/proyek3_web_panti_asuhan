<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita & Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
            margin-left: 300px;
        }
        .sidebar {
            position: fixed;
        }

        .section-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .card-container .news-card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.2s ease;
            cursor: pointer;
        }

        .card-container .news-card:hover {
            transform: scale(1.05);
        }

        .news-card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            width: 100%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            text-decoration: none;
            color: inherit;
            transition: transform 0.2s ease;
        }

        .news-card:hover {
            transform: scale(1.05);
        }

        .news-card img {
            width: 300px;
            height: 200px;
            border-radius: 8px;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .news-card h5 {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .news-card p {
            font-size: 14px;
            color: #666;
        }

        .bulletin {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin-top: 40px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .bulletin input[type="email"] {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-right: 10px;
            width: 200px;
        }

        .bulletin button {
            background-color: #6366F1;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .bulletin button:hover {
            background-color: #4F46E5;
        }

        @media (max-width: 768px) {
            .card-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .card-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    @include('components.sidebardonatur')

    <div class="main-content">
        <div class="section-title">Berita & Artikel</div>

        <div class="card-container">
            @foreach ($berita as $item)
                <a href="{{ route('berita.show', $item->id_berita) }}" class="news-card" style="text-decoration: none;">
                    <img src="{{ $item->gambar_berita ? asset('storage/' . $item->gambar_berita) : '#' }}"
                        alt="Gambar Berita" class="img">
                    <h5>{{ $item->nama_berita }}</h5>
                    <p>{{ \Carbon\Carbon::parse($item->tgl_upload)->format('d M, Y') }}</p>
                </a>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
