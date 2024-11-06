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
        return view('Admin.loginadmin');
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
        }

        return back()->withErrors([
            'email_admin' => 'Email atau password tidak valid.',
        ]);
    }
}

