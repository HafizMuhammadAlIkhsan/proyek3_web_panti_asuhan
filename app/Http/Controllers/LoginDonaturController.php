<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Donatur;

class LoginDonaturController extends Controller
{
    public function showLoginForm()
    {
        return view('Masyarakat_Umum/login'); // Mengarahkan ke view login
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cari pengguna berdasarkan email atau nomor kontak
        $donatur = Donatur::where('email', $request->email)
                            ->orWhere('kontak', $request->kontak)
                            ->first();

        // Verifikasi password
        if ($donatur && Hash::check($request->password, $donatur->password)) {
            Auth::login($donatur); // Login pengguna
            return redirect()->intended('/beranda_donatur'); // Redirect ke halaman home atau sesuai rencana
        }

        // Jika login gagal, kembalikan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Logout pengguna
        return redirect('/'); // Redirect ke halaman login
    }
}
