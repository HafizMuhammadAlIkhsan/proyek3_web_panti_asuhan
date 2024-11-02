<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donasi Barang</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #F5F5F9;
            font-family: Arial, sans-serif;
        }

        .main {
            margin-left: 250px;
            padding: 20px;
        }

        .header-banner {
            background-color: #D1B2FF;
            width: 100%;
            padding: 20px 0;
            text-align: center;
            color: #fff;
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        .form-title {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-title span {
            color: #9f5ffe;
        }

        .form-control {
            margin-bottom: 20px;
        }

        .btn-submit {
            background-color: #D1B2FF;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
            width: 100%;
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

        .input-group {
            margin-bottom: 20px;
        }

        .date-group {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
    @include('components.sidebardonatur')

    <div class="main">
        <div class="header-banner">Donasi Barang</div>

        <div class="form-container">
            <!-- Form Input Donasi -->
            <form id="donation-form">
                <div class="form-title">
                    <h2>Donasi <span>Barang</span></h2>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Donatur</label>
                    <input type="text" class="form-control" required>
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
                    <h2>Verifikasi <span>Donasi</span></h2>
                </div>

                <div class="image-upload" onclick="document.getElementById('file-input').click()">
                    <label class="form-label">Upload Bukti Foto Barang</label>
                    <input type="file" id="file-input" class="form-control" accept="image/*" required hidden>
                    <p class="text-muted">Klik untuk memilih file atau drop file di sini</p>
                    <img id="image-preview" class="image-preview">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Pengiriman</label>
                    <div class="date-group">
                        <select class="form-control" required>
                            <option value="">Tanggal</option>
                            <script>
                                for(let i = 1; i <= 31; i++) {
                                    document.write(`<option value="${i}">${i}</option>`);
                                }
                            </script>
                        </select>
                        <select class="form-control" required>
                            <option value="">Bulan</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                        <select class="form-control" required>
                            <option value="">Tahun</option>
                            <script>
                                const currentYear = new Date().getFullYear();
                                for(let i = currentYear; i >= currentYear - 10; i--) {
                                    document.write(`<option value="${i}">${i}</option>`);
                                }
                            </script>
                        </select>
                    </div>
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