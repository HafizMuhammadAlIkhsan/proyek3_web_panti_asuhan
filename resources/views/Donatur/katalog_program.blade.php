<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Panti</title>
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

        .sidebar {
            position: fixed;
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

        .modal-body img {
            max-width: 100%;
            border-radius: 8px;
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
        <div class="section-title">Program Panti Asuhan</div>

        <div class="card-container">
            @foreach ($programpanti as $program)
                <div class="news-card" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#programModal"
                    data-image="{{ $program->gambar_program ? asset('storage/' . $program->gambar_program) : '#' }}"
                    data-name="{{ $program->nama_program }}" data-description="{{ $program->deskripsi_program }}"
                    data-date="{{ \Carbon\Carbon::parse($program->tgl_upload)->format('d M, Y') }}"
                    data-dana="{{ $program->dana_program }}" data-dana-terkumpul="{{ $program->dana_terkumpul }}">
                    <img src="{{ $program->gambar_program ? asset('storage/' . $program->gambar_program) : '#' }}"
                        alt="Gambar Program" class="img">
                    <h5>{{ $program->nama_program }}</h5>
                    <p>{{ \Carbon\Carbon::parse($program->tgl_upload)->format('d M, Y') }}</p>
                </div>
            @endforeach
        </div>

    </div>

    <div class="modal fade" id="programModal" tabindex="-1" aria-labelledby="programModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="programModalLabel">Detail Program</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="modalProgramImage" src="" alt="Gambar Program" class="img-fluid mb-3">
                    <h5 id="modalProgramName"></h5>
                    <p id="modalProgramDescription"></p>
                    <p><strong>Tanggal Upload:</strong> <span id="modalProgramDate"></span></p>
                    <p><strong>Dana Program:</strong> <span id="modalProgramDana"></span></p>
                    <p><strong>Dana Terkumpul:</strong> <span id="modalDanaTerkumpul"></span></p>
                    <div class="progress">
                        <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%;"
                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                            <span id="progressPercentage" style="color: white; font-weight: bold;"></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('programModal');
            modal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const image = button.getAttribute('data-image');
                const name = button.getAttribute('data-name');
                const description = button.getAttribute('data-description');
                const date = button.getAttribute('data-date');
                const danaProgram = parseInt(button.getAttribute('data-dana'));
                const danaTerkumpul = parseInt(button.getAttribute('data-dana-terkumpul'));

                // Hitung persentase
                const progress = Math.min((danaTerkumpul / danaProgram) * 100, 100);

                // Isi data ke modal
                modal.querySelector('#modalProgramImage').src = image;
                modal.querySelector('#modalProgramName').textContent = name;
                modal.querySelector('#modalProgramDescription').innerHTML = description;
                modal.querySelector('#modalProgramDate').textContent = date;
                modal.querySelector('#modalProgramDana').textContent = `Rp${danaProgram.toLocaleString()}`;
                modal.querySelector('#modalDanaTerkumpul').textContent =
                    `Rp${danaTerkumpul.toLocaleString()}`;

                const progressBar = modal.querySelector('#progressBar');
                const progressPercentage = modal.querySelector('#progressPercentage');

                // Update progress bar
                progressBar.style.width = `${progress}%`;
                progressBar.setAttribute('aria-valuenow', progress);

                // Tampilkan persentase di progress bar
                progressPercentage.textContent = `${Math.round(progress)}%`;
            });
        });
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
