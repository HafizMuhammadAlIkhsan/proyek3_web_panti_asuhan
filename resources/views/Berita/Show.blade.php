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
            display: flex;
        }

        .content-wrapper {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .main-content {
            width: 100%;
            max-width: 900px;
            margin-left: 200px;
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
            transition: transform 0.3s ease;
        }

        .news-card:hover img {
            transform: scale(1.1);
        }

        .news-card h5 {
            font-size: 18px;
            color: #4F46E5;
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
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .bulletin button:hover {
            background-color: #4F46E5;
        }

        .img {
            max-width: 500px;
            max-height: 300px;
        }

        .Top-Container {
            background-color: #ffffff;
            width: 100%;
            height: 80px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 10px;
        }

        .Middle-Container {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            margin: 20px auto;
            width: 90%;
            position: relative;
        }

        .Bottom-Container {
            width: 100%;
            background-color: #ffffff;
            border-top: 3px solid #4F46E5;
            display: flex;
            flex-direction: column;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            color: #333;
        }

        .img-container {
            position: relative;
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .img {
            width: 100%;
            max-width: 500px;
            height: auto;
            border-radius: 8px;
            object-fit: cover;
        }

        .news-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-top: 15px;
            text-align: center;
        }

        .date {
            position: absolute;
            bottom: 10px;
            right: 20px;
            font-size: 14px;
            color: #666;
            background: rgba(255, 255, 255, 0.8);
            padding: 5px 10px;
            border-radius: 5px;
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
   
    <div class="content-wrapper">
        <div class="main-content">
            <div class="Top-Container">
                <div class="section-title">{{ $berita->nama_berita }}</div>
            </div>
            <div class="Middle-Container">
                <div class="img-container">
                    <img src="{{ $berita->gambar_berita ? asset('storage/' . $berita->gambar_berita) : '#' }}"
                        alt="Gambar Berita" class="img">
                    <p class="date">{{ \Carbon\Carbon::parse($berita->tgl_upload)->format('d M, Y') }}</p>
                </div>
                <h2 class="news-title">{{ $berita->nama_berita }}</h2>
            </div>
            <div class="Bottom-Container">
                <div class="news-detail">
                    <div class="content">{!! $berita->isi_berita !!}</div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>



</html>
