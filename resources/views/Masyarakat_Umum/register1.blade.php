<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
    <title>Create an Account</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, rgb(131, 78, 209), rgb(153, 61, 164), rgb(67,40,107));
        }
        .container {
            display: flex;
            max-width: 900px;
            width: 100%;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .image-container {
            width: 50%;
            background: url('image/anakpanti.jpg') no-repeat center center;
            background-size: cover;
        }
        .form-container {
            width: 50%;
            padding: 40px;
            background-color: #eee;
        }
        .form-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
        }
        .form-container form {
            display: flex;
            flex-direction: column;
        }
        .form-container input {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container button {
            padding: 10px;
            font-size: 16px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #45a049;
        }
        .form-container a {
            text-align: center;
            margin-top: 10px;
            color: #666;
            font-size: 14px;
            text-decoration: none;
        }
        .form-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="image-container"></div>
        <div class="form-container">
            <h2>Create an Account</h2>
            <form method="POST" action="{{ route('register.step1.post') }}">
                @csrf
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                <input type="text" name="kontak" placeholder="Kontak" required>
                <button type="submit" class="btn btn-register btn-block btn-success">Buat Akun!</button>
                <a href="Login">Sudah Memiliki Akun? Log in</a>
                <a href="#">Atau Gunakan Google</a>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
          $(".btn-register").click(function() {
            var email = $("#email").val();
            var password = $("#password").val();
            var confirm_password = $("#confirm_password").val();
            var no_hp = $("#no_hp").val();

            if (email === "") {
              Swal.fire({ type: 'warning', title: 'Oops...', text: 'Email Wajib Diisi !' });
            } else if (password === "") {
              Swal.fire({ type: 'warning', title: 'Oops...', text: 'Password Wajib Diisi !' });
            } else if (confirm_password === "") {
              Swal.fire({ type: 'warning', title: 'Oops...', text: 'Konfirmasi Password Wajib Diisi !' });
            } else if (password !== confirm_password) {
              Swal.fire({ type: 'warning', title: 'Oops...', text: 'Confirm Password Harus Sama dengan Password !' });
            } else {
              // Lanjutkan submit form
              $("form").submit();
            }
          });
        });
    </script>

    {{-- <script>
        function goToRegister2(event) {
            // Menghentikan aksi submit default
            event.preventDefault();

            // Arahkan ke halaman register2.html
            window.location.href = "Register2";
        }
    </script> --}}

</body>
</html>
