<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Donatur;

class RegisterController extends Controller
{
    public function showRegister1()
    {
        return view('Masyarakat_Umum.register1');
    }

    public function postRegister1(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:donatur,email',
            'password' => 'required|confirmed',
            'kontak' => 'required|max:12',
        ]);

        $request->session()->put('register1', $validated);

        return redirect()->route('register.step2');
    }

    public function showRegister2(Request $request)
    {
        if (!$request->session()->has('register1')) {
            return redirect()->route('register.step1');
        }

        $email = $request->session()->get('register1')['email'];
        return view('Masyarakat_Umum.register2', compact('email'));
    }

    public function postRegister2(Request $request)
    {
        $register1Data = $request->session()->get('register1');

        Donatur::create([
            'email' => $register1Data['email'],
            'password' => bcrypt($register1Data['password']),
            'kontak' => $register1Data['kontak'],
            'username' => $request->input('username'),
            'alamat' => $request->input('alamat'),
            'pekerjaan' => $request->input('pekerjaan'),
            'tgl_lahir_donatur' => $request->input('tahun') . '-' . $request->input('bulan') . '-' . $request->input('tanggal'),
            'gender' => $request->input('gender'),
        ]);

        $request->session()->forget('register1');

        return redirect()->route('login');
    }
}