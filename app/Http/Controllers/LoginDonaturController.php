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
        return view('Masyarakat_Umum/login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cari pengguna berdasarkan email
        $donatur = Donatur::where('email', $request->email)->first();

        if ($donatur && Hash::check($request->password, $donatur->password)) {
            Auth::guard('user')->login($donatur);
            return redirect()->intended('beranda_donatur');
        }

        // Jika login gagal, kembalikan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
