<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('Masyarakat_Umum.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek kredensial
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Redirect ke halaman dashboard atau halaman yang diinginkan
            return redirect()->intended('/home');
        }

        // Jika login gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login'); // Ganti dengan route login jika berbeda
    }
}
