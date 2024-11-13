<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROFILE_DONATUR</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #F5F5F9;
            overflow-x: hidden;
        }
        .main {
            width: 100%;
            height: 100%;
            background-color: #F5F5F9;
        }
        .Top-Container {
            background-color: #ffffff;
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
        }
        /* Middle Container with user profile and donation summary */
        .Middle-Container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            width: 90%;
            margin-left: 150px;
        }
        .profile-section {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .profile-section img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            margin-bottom: 15px;
        }
        .profile-section h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .profile-section p {
            font-size: 18px;
            color: #666;
        }
        .Bottom-Container {
            width: 100%;
            height: auto;
            background-color: #ffffff;
            border-top: 3px solid black;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            padding: 20px;
        }
        .Bottom-container-stripe {
            background-color: #661AD1;
            width: 100%;
            height: 25px;
            margin-top: 2px;
        }
        .Bottom-Button {
            display: flex;
            flex-direction: Row;
            padding-top: 10px;
            padding-left: 20px;
        }
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
        .button:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }
        .button-icon {
            background-color: #FFFFFF;
            border-radius: 50%;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }
        .button-icon img {
            width: 25px;
            height: 25px;
        }
        .icon {
            font-size: 100px;
        }
        .icon-2 {
            font-size: 33px;
        }

        /* style.css */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;   
            background-color: #F5F5F9;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }
        
        .container {
            margin-left: 290px;
            padding: 20px;
            background-color: #FFF;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 80%;
            max-width: 800px;
            border-top: 10px solid #C9A6F7;
            border-bottom: 10px solid #C9A6F7;
            max-width: 1200px;
        }

        .profile-form {
            width: 80%; /* Mengatur lebar form */
            max-width: 1000px;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            position: relative;
            margin-left: 20px;
        }

        .edit-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            left: 900px;
            padding: 10px 20px;
            background-color: #4285F4;
            color: #FFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 60px;
        }

        .input-field {
            flex: 1 1 45%;
            display: flex;
            flex-direction: column;
        }

        .input-field label {
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
        }

        .input-field input {
            padding: 10px;
            font-size: 16px;
            color: #999;
            background-color: #F9F9F9;
            border: 1px solid #EEE;
            border-radius: 5px;
            cursor: not-allowed;
        }

        .contact-info {
            margin-top: 20px;
            width: 100%;
            text-align: left;
        }

        .contact-info h3 {
            font-size: 16px;
            color: #333;
            margin-bottom: 10px;
        }

        .contact-email {
            display: flex;
            align-items: center;
            font-size: 16px;
            color: #555;
        }

        .email-icon {
            font-size: 20px;
            margin-right: 10px;
            color: #4285F4;
        }
        .date-select select {
            width: 32%;
            padding: 10px;
            font-size: 16px;
            color: #999;
            background-color: #F9F9F9;
            border: 1px solid #EEE;
            border-radius: 5px;
            cursor: not-allowed;
            margin-right: 3px;
        }
        .date-select select:disabled {
            cursor: not-allowed;
        }
    </style>
</head>

<body>
    @include('components.sidebardonatur_setting')

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <div class="main">
        <!-- Top container -->
        <div class="Top-Container">
            <div class="Center-Top"></div>
        </div>

        <!-- Middle container with profile and donation summary -->
        <div class="Middle-Container">
            <div class="profile-section">
                <ion-icon name="person-circle-outline" class="icon"></ion-icon>
                <h2>Selamat Datang, {{ $profileData['nama_asli'] }}!</h2>
            </div>
        </div>

        <!-- Account details card-->
        <div class="container">
            <form id="profileForm" action="{{ route('hal_profile_donatur.post') }}" method="POST">
                @csrf
                <div class="profile-form">
                    <button type="button" class="edit-btn" onclick="toggleEditMode()">Edit Bio</button>
                    <div class="form-group">
                        <div class="input-field">
                            <label>Username</label>
                            <input type="text" name="username" value="{{ $profileData['username'] }}" disabled>
                        </div>
                        <div class="input-field">
                            <label>Nama asli</label>
                            <input type="text" name="nama_asli" value="{{ $profileData['nama_asli'] }}" disabled>
                        </div>
                        <div class="input-field">
                            <label>Nomor HandPhone</label>
                            <input type="text" name="nomor_handphone" value="{{ $profileData['kontak'] }}" disabled>
                        </div>
                        <div class="input-field">
                            <label>Tanggal Lahir</label>
                            <div class="date-select">
                                <select name="tahun_lahir" id="year" disabled>
                                    @for ($y = now()->year; $y >= 1950; $y--)
                                        <option value="{{ $y }}" {{ $y == $profileData['tahun_lahir'] ? 'selected' : '' }}>{{ $y }}</option>
                                    @endfor
                                </select>
                                <select name="bulan_lahir" id="month" disabled>
                                    @for ($m = 1; $m <= 12; $m++)
                                        <option value="{{ str_pad($m, 2, '0', STR_PAD_LEFT) }}" {{ $m == $profileData['bulan_lahir'] ? 'selected' : '' }}>
                                            {{ str_pad($m, 2, '0', STR_PAD_LEFT) }}
                                        </option>
                                    @endfor
                                </select>
                                <select name="hari_lahir" id="day" disabled>
                                    @for ($d = 1; $d <= 31; $d++)
                                        <option value="{{ str_pad($d, 2, '0', STR_PAD_LEFT) }}" {{ $d == $profileData['hari_lahir'] ? 'selected' : '' }}>
                                            {{ str_pad($d, 2, '0', STR_PAD_LEFT) }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="input-field">
                            <label>Pekerjaan</label>
                            <input type="text" name="pekerjaan" value="{{ $profileData['pekerjaan'] }}" disabled>
                        </div>
                        <div class="input-field">
                            <label>Gender</label>
                            <select name="gender" id="gender" disabled>
                                <option value="true" {{ $profileData['gender'] === true ? 'selected' : '' }}>Laki-laki</option>
                                <option value="false" {{ $profileData['gender'] === false ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="contact-info">
                        <h3>Contact Saya</h3>
                        <div class="contact-email">
                            <span class="email-icon">📧</span>
                            <span>{{ $profileData['email'] }}</span>
                        </div>
                    </div>
                    {{-- <button type="submit" id="saveChangesBtn">Save Changes</button> --}}

                </div>
            </form>
        </div>
        

        <script>
            function toggleEditMode() {
            const formFields = document.querySelectorAll('#profileForm input, #profileForm select');
            const editButton = document.querySelector('.edit-btn');
            
            if (editButton.innerText === "Edit Bio") {
                formFields.forEach(field => field.disabled = false);
                editButton.innerText = "Save Changes";
            } else {
                formFields.forEach(field => field.disabled = false); // pastikan semua input diaktifkan
                document.getElementById("profileForm").submit();
            }
        }


        //     function toggleEditMode() {
        //     const inputs = document.querySelectorAll('.input-field input, .input-field select');
        //     const button = document.querySelector('.edit-btn');
            
        //     if (button.textContent === "Edit Bio") {
        //         inputs.forEach(input => {
        //             input.disabled = false;
        //             input.style.cursor = 'pointer';
        //         });
        //         button.textContent = "Save Changes"
        //     } else {
        //         inputs.forEach(input => {
        //             input.disabled = true;
        //             input.style.cursor = 'not-allowed';
        //         });
        //         button.textContent = "Edit Bio";
        //     }
        // }


            // function toggleEditMode() {
            //     const inputs = document.querySelectorAll('.input-field input');
            //     const button = document.querySelector('.edit-btn');
                
            //     if (button.textContent === "Edit Bio") {
            //         inputs.forEach(input => {
            //             input.disabled = false;
            //             input.style.cursor = 'text'; // Enable cursor for text input
            //         });
            //         button.textContent = "Save Changes"; // Change button text
            //     } else {
            //         inputs.forEach(input => {
            //             input.disabled = true;
            //             input.style.cursor = 'not-allowed'; // Set cursor back to not-allowed
            //         });
            //         button.textContent = "Edit Bio"; // Reset button text
            //     }
            // }
        </script>
</body>

</html>
