<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400&display=swap" rel="stylesheet">
    <title>DONASI</title>
    <style>
        body {
            background-color: #f8f9fa;
            align-items: center;
            height: 100vh;
            color: #333;
        }
        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 70%;
            max-width: 1200px;
            padding-left: 100px;
        }
        .header {
            max-width: 50%;
            margin-right: 20px;
        }
        .subtitle {
            font-size: 1.2rem;
            color: #a482ff;
            margin-bottom: 5px;
        }
        .title {
            font-size: 3rem;
            font-weight: bold;
            color: #333;
        }
        .highlight {
            color: #a482ff;
        }
        .description {
            font-size: 1rem;
            color: #666;
            margin-top: 10px;
        }
        .kotak {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .kotak::after {
            content: '';
            position: absolute;
            top: 10px;
            right: -10px;
            width: 100%;
            height: 100%;
            background-color: #00c4cc;
            border-radius: 10px;
            z-index: -1;
        }
        .donasi-btn {
            background-color: #00c4cc;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            margin-bottom: 15px;
            display: inline-block;
        }
        .kotak-title {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 10px;
        }
        .kotak-text {
            font-size: 1rem;
            color: #666;
            margin-bottom: 20px;
        }
        .donasi-now-btn {
            background-color: transparent;
            color: #00c4cc;
            border: 1px solid #00c4cc;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .donasi-now-btn:hover {
            background-color: #009c9a; 
        }
    </style>
</head>
<body>
    @include('components.sidebar')

    <div class="container">
        <div class="header">
            <p class="subtitle">Panti Anak Asuhan</p>
            <h1 class="title">Kata-Kata <span class="highlight">Mutiara</span></h1>
            <p class="description">Lorem ipsum dolor sit amet</p>
        </div>
        <div class="kotak">
            <p class="donasi-btn">Donasi</p>
            <h2 class="kotak-title">Kalimat Persuasif</h2>
            <p class="kotak-text">Lorem ipsum dolor sit amet </p>
            <button class="donasi-now-btn">Donasi Sekarang</button>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>