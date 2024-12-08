<?php

namespace App\Http\Controllers\Donatur;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Donatur;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('Masyarakat_Umum.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $donatur = Donatur::where('email', $request->email)->first();

        if ($donatur && Hash::check($request->password, $donatur->password)) {
            Auth::guard('donatur')->login($donatur);         
            return redirect()->intended('beranda_donatur');
        } else {
            return redirect()->back()->withErrors(['email' => 'Email atau password salah']);
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('donatur')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}