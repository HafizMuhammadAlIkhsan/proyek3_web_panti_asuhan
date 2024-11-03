<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donasi Barang</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <style>
        body {
            background-color: #F5F5F9;
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
        }

        /* Sidebar occupies fixed space */
        .sidebar {
            width: 280px;
        }

        /* Main Content Container */
        .main {
            flex: 1; /* Take up the remaining width */
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center; /* Center content horizontally */
        }

        .page-title {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px; /* Adds space between Donasi and Barang */
            width: 100%;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .text-black {
            color: #000; /* Black color for "Donasi" */
        }

        .text-purple {
            color: #9f5ffe; /* Purple color for "Barang" */
        }

        .form-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            max-width: 700px;
            width: 100%;
        }

        .form-title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-control {
            margin-bottom: 20px;
            height: 45px;
            width: 100%;
        }

        .btn-submit {
            background-color: #D1B2FF;
            color: white;
            border: none;
            padding: 12px 0;
            border-radius: 5px;
            width: 630px; /* Fixed width */
            max-width: 630px;
            min-width: 630px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #9f5ffe;
        }

        #verification-form {
            display: none;
        }

        .image-upload {
            border: 2px dashed #D1B2FF;
            padding: 20px;
            text-align: center;
            border-radius: 5px;
            margin-bottom: 20px;
            cursor: pointer;
            transition: border-color 0.3s;
        }

        .image-upload:hover {
            border-color: #9f5ffe;
        }

        .image-preview {
            max-width: 100%;
            margin-top: 10px;
            display: none;
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
    <!-- Sidebar Component -->
    @include('components.sidebardonatur')

    <!-- Main Content -->
    <div class="main">
        <!-- Title Outside the Form Container -->
        <div class="page-title">
            <h1 class="text-black">Donasi</h1> 
            <h1 class="text-purple">Barang</h1>
        </div>

        <div class="form-container">
            <!-- Form Input Donasi -->
            <form id="donation-form">
                <div class="mb-3">
                    <label class="form-label">Metode Pengiriman</label>
                    <select class="form-control" required>
                        <option value="" disabled selected>Pilih Metode Pengiriman</option>
                        <option value="Jasa Pengiriman">Jasa Pengiriman</option>
                        <option value="Pengiriman Mandiri">Pengiriman Mandiri</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah Barang</label>
                    <input type="number" class="form-control" required>
                </div>

                <button type="submit" class="btn-submit">Lanjutkan Donasi</button>
            </form>

            <!-- Form Verifikasi -->
            <form id="verification-form">
                <div class="form-title">
                    <h5 class="text-black">Verifikasi Donasi</h5> 
                </div>

                <div class="image-upload" onclick="document.getElementById('file-input').click()">
                    <label class="form-label">Upload Bukti Foto Barang</label>
                    <input type="file" id="file-input" class="form-control" accept="image/*" required hidden>
                    <p class="text-muted">Klik untuk memilih file atau drop file di sini</p>
                    <img id="image-preview" class="image-preview">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Pengiriman</label>
                    <input type="date" class="form-control" required>
                </div>

                <button type="submit" class="btn-submit">Kirim Verifikasi</button>
            </form>
        </div>
    </div>

    <script>
        // Form switching
        document.getElementById('donation-form').addEventListener('submit', function(e) {
            e.preventDefault();
            this.style.display = 'none';
            document.getElementById('verification-form').style.display = 'block';
        });

        // Image preview
        document.getElementById('file-input').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if(file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('image-preview');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });

        // Form verification submission
        document.getElementById('verification-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Donasi berhasil dikirim!');
            window.location.reload();
        });

        // Drag and drop functionality
        const dropZone = document.querySelector('.image-upload');
        
        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.style.borderColor = '#9f5ffe';
        });

        dropZone.addEventListener('dragleave', (e) => {
            e.preventDefault();
            dropZone.style.borderColor = '#D1B2FF';
        });

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.style.borderColor = '#D1B2FF';
            const file = e.dataTransfer.files[0];
            if(file) {
                document.getElementById('file-input').files = e.dataTransfer.files;
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('image-preview');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
