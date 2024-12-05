<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class LoginAdminController extends Controller
{
    public function showLoginForm()
    {
        return view('Admin.login_admin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email_admin' => 'required|string',
            'password_admin' => 'required|string',
        ]);

        $admin = Admin::where('email_admin', $request->email_admin)->first();

        if ($admin && Hash::check($request->password_admin, $admin->password_admin)) {
            Auth::guard('admin')->login($admin);
            return redirect()->intended('Beranda_Admin');
        } else {
            return redirect()->back()->withErrors(['email' => 'Email atau password salah']);
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/login_admin');
    }
}

