<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <title>Berita</title>
    
    <style>
        body {
            background-color: #F5F5F9;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        .main-content {
            margin-left: 50px;
        }

        .section-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .card-container {
            display: flex;
            gap: 20px;
            margin-top: 20px;
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
        .img{
            max-width: 500px;
            max-height: 300px;
        }
    </style>

</head>

<body>
    @include('components.sidebar')
    <div class="main-content">
        <div class="section-title">Detail Berita</div>

        <div class="news-detail">
            <img src="{{ $berita->gambar_berita ? asset('storage/' . $berita->gambar_berita) : '#' }}" alt="Gambar Berita" class="img">
            <h2>{{ $berita->nama_berita }}</h2>
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($berita->tgl_upload)->format('d M, Y') }}</p>
            <div class="content">{!! $berita->isi_berita !!}</div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
