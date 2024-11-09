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

        .sidebar {
            width: 280px;
        }

        .main {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .page-title {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            width: 100%;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .text-black {
            color: #000;
        }

        .text-purple {
            color: #9f5ffe;
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
            width: 630px;
            max-width: 630px;
            min-width: 630px;
            font-size: 16px;
            transition: background-color 0.3s;
            cursor: not-allowed;
        }

        .btn-submit:enabled {
            cursor: pointer;
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

        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #9f5ffe;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            z-index: 1000;
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
            <form action="{{route('post.donasi.barang')}}" method="POST" enctype="multipart/form-data">
            <!-- Form Input Donasi -->
            @csrf
            
            <div id="donation-form">
                <div class="mb-3">
                    <label class="form-label">Metode Pengiriman</label>
                    <select class="form-control" required name="metode_pengiriman">
                        <option value="" disabled selected>Pilih Metode Pengiriman</option>
                        <option value="Jasa Pengiriman">Jasa Pengiriman</option>
                        <option value="Pengiriman Mandiri">Pengiriman Mandiri</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" required name="nama_barang">
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah Barang</label>
                    <input type="number" class="form-control" required name="jumlah_barang">
                </div>

                <button type="button" class="btn-submit" id="donation-submit" disabled>Lanjutkan Donasi</button>
            </div>


            <!-- Form Verifikasi -->
            <div id="verification-form">
                <div class="form-title">
                    <h5 class="text-black">Verifikasi Donasi</h5> 
                </div>

                <div class="image-upload" onclick="document.getElementById('file-input').click()">
                    <label class="form-label">Upload Bukti Foto Barang</label>
                    <input type="file" id="file-input" class="form-control" name="bukti_foto" accept="image/*" required hidden>
                    <p class="text-muted">Klik untuk memilih file atau drop file di sini</p>
                    <img id="image-preview" class="image-preview">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Pengiriman</label>
                    <input type="date" class="form-control" required name="tanggal_verifikasi_barang">
                </div>

                <button type="submit" class="btn-submit" id="verification-submit" disabled>Kirim Verifikasi</button>
            </div>
            </form>

        </div>
    </div>

    <script>
        // Function to enable the button if all required fields are filled
        function toggleButtonState(formId, buttonId) {
            const form = document.getElementById(formId);
            const button = document.getElementById(buttonId);
            const allFilled = Array.from(form.querySelectorAll('input[required], select[required]'))
                .every(input => input.value.trim() !== '');

            if (allFilled) {
                button.disabled = false;
                button.style.backgroundColor = '#9f5ffe'; // Active color
            } else {
                button.disabled = true;
                button.style.backgroundColor = '#D1B2FF'; // Inactive color
            }
        }

        // Add event listeners to the form inputs to check for completion
        document.querySelectorAll('#donation-form input[required], #donation-form select[required]').forEach(input => {
            input.addEventListener('input', () => toggleButtonState('donation-form', 'donation-submit'));
        });

        document.querySelectorAll('#verification-form input[required]').forEach(input => {
            input.addEventListener('input', () => toggleButtonState('verification-form', 'verification-submit'));
        });

        // Form switching
        document.getElementById('donation-submit').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('donation-form').style.display = 'none';
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
        // document.getElementById('verification-submit').addEventListener('click', function(e) {
        //     e.preventDefault();
        //     // alert('Donasi berhasil dikirim!');
            
        //     // Create notification element
        //     const notification = document.createElement('div');
        //     notification.textContent = 'Form verifikasi telah berhasil dikirim.';
        //     notification.classList.add('notification');
            
        //     // Append notification to the body
        //     document.body.appendChild(notification);
            
        //     // Remove notification after 3 seconds
        //     // setTimeout(() => {
        //     //     notification.remove();
        //     // }, 3000);

        //     // window.location.reload();
        // });

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
