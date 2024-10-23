<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME_DONATUR</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400&display=swap" rel="stylesheet">
    <style>
        /* Apply to all elements to prevent overflow issues */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body style */
        body {
            background-color: #F5F5F9;
            overflow-x: hidden;
        }

        /* Main container */
        .main {
            width: 100%;
            height: 100%;
            background-color: #661AD1;
        }

        /* Top container with a centered element */
        .Top-Container {
            background-color: #ffffff;
            width: 100%;
            height: 80px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Centered content in the top container */
        .Center-Top {
            border: 3px solid #000000;
            width: 50px;
            height: 50px;
        }

        /* Middle container */
        .Middle-Container {
            background-color: #c1c1c1;
            width: 100%;
            height: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        /* Bottom container for buttons */
        .Bottom-Container {
            width: 100%;
            height: 250px;
            background-color: #ffffff;
            border-top: 3px solid black;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        /* Purple stripe in the bottom container */
        .Bottom-container-stripe {
            background-color: #661AD1;
            width: 100%;
            height: 50px;
            margin-top: 2px;
        }

        /* Button container positioning */
        .Bottom-Button {
            padding-left: 20px;
        }

        /* Button styling */
        .button-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .button {
            display: flex;
            align-items: center;
            background-color: #F5F5F5;
            border-radius: 20px;
            padding: 15px 20px;
            width: 300px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            color: #333;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        /* Hover effect for the buttons */
        .button:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        /* Icon container inside buttons */
        .button-icon {
            background-color: #FFFFFF;
            border-radius: 50%;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }

        /* Icon styling */
        .button-icon img {
            width: 25px;
            height: 25px;
        }

        /* Notification icon */
        .notification-icon {
            position: relative;
        }

        /* Red notification dot */
        .notification-dot {
            position: absolute;
            top: 0;
            right: 0;
            width: 8px;
            height: 8px;
            background-color: #FF5722;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    @include('components.sidebaradmin')

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <div class="main">
        <!-- Top container -->
        <div class="Top-Container">
            <div class="Center-Top"></div>
        </div>

        <!-- Middle container -->
        <div class="Middle-Container"></div>

        <!-- Bottom container with buttons -->
        <div class="Bottom-Container">
            <div class="Bottom-container-stripe"></div>
            
            <div class="Bottom-Button">
                <div class="button-container">
                    <!-- First button with notification dot -->
                    <a href="#" class="button">
                        <div class="button-icon notification-icon">
                            <img src="https://via.placeholder.com/25" alt="Bell Icon">
                            <span class="notification-dot"></span>
                        </div>
                        <span>&lt;INT&gt; Donasi Menunggu untuk di konfirmasi</span>
                    </a>

                    <!-- Second button -->
                    <a href="#" class="button">
                        <div class="button-icon">
                            <img src="https://via.placeholder.com/25" alt="News Icon">
                        </div>
                        <span>Upload Berita</span>
                    </a>

                    <!-- Third button -->
                    <a href="#" class="button">
                        <div class="button-icon">
                            <img src="https://via.placeholder.com/25" alt="Data Icon">
                        </div>
                        <span>Kelola Data Anak</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
