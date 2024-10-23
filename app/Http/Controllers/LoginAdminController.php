<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoginAdmin;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function showLoginForm()
    {
        return view('loginadmin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email_admin' => 'required|email',
            'password_admin' => 'required',
        ]);

        $admin = LoginAdmin::where('email_admin', $request->email_admin)->first();

        if ($admin && $admin->password_admin === $request->password_admin) {
            Auth::login($admin);
            return redirect()->route('beranda');
        }

        return back()->withErrors([
            'email_admin' => 'Email atau password tidak valid.',
        ])->withInput()->with('loginFailed', true);
    }
}

