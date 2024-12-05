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
            'email' => [
                'required',
                'email',
                'unique:donatur,email',
                'regex:/^[\w._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/',
            ],
            'password' => 'required|confirmed|min:8',
            'kontak' => [
                'required',
                'regex:/^[0-9]+$/',
                'max:12',
            ],
        ], [
            'email.unique' => 'Email sudah terdaftar. Silakan gunakan email lain.',
            'email.regex' => 'Format email tidak valid. Pastikan email berformat seperti example@example.com.',
            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Password dan konfirmasi password tidak cocok.',
            'password.min' => 'Password harus memiliki minimal 8 karakter.',
            'kontak.required' => 'No Handphone wajib diisi.',
            'kontak.max' => 'No Handphone maksimal 12 digit.',
            'kontak.regex' => 'No Handphone hanya boleh berupa angka.',
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
        $request->validate([
            'username' => 'required|string|max:255',
        ]);

        $tahun = $request->input('tahun');
        $bulan = $request->input('bulan');
        $tanggal = $request->input('tanggal');

        if ($tahun && $bulan && $tanggal) {
            $tglLahir = $tahun . '-' . $bulan . '-' . $tanggal;   
            try {
                $date = new \DateTime($tglLahir);
                $tglLahir = $date->format('Y-m-d');
            } catch (\Exception $e) {
                $tglLahir = null;
            }
        } else {
            $tglLahir = null;
        }
        Donatur::create([
            'email' => $register1Data['email'],
            'password' => bcrypt($register1Data['password']),
            'kontak' => $register1Data['kontak'],
            'username' => $request->input('username'),
            'alamat' => $request->input('alamat'),
            'pekerjaan' => $request->input('pekerjaan'),
            'tgl_lahir_donatur' => $tglLahir,
            'gender' => $request->input('gender'),
        ]);

        $request->session()->forget('register1');
        
        return redirect()->route('login');
    }
}