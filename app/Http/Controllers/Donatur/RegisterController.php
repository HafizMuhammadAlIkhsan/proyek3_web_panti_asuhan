<?php

namespace App\Http\Controllers\Donatur;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            'password' => 'required|confirmed|min:8',
            'kontak' => 'required|regex:/^[0-9]+$/|max:12',
        ], [
            'email.email' => 'Format email tidak valid',
            'email.required' => 'Email Wajib diisi.',
            'email.unique' => 'Email sudah terdaftar. Silakan gunakan email lain.',
            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Password dan konfirmasi password tidak cocok.',
            'password.min' => 'Password harus memiliki minimal 8 karakter.',
            'kontak.required' => 'Nomor Handphone wajib diisi.',
            'kontak.max' => 'Nomor Handphone maksimal 12 digit.',
            'kontak.regex' => 'Nomor Handphone hanya boleh berupa angka.',
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
            'username' => 'required|string|max:50',
            'kota' => 'nullable|string|max:30',
            'pekerjaan' => 'nullable|string|max:50',
            'gender' => 'nullable|boolean',
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.max' => 'Username maksimal 50 karakter.',
            'kota.max' => 'Kota maksimal 30 karakter.',
            'pekerjaan.max' => 'Pekerjaan maksimal 50 karakter.',
        ]);

        $tahun = $request->input('tahun');
        $bulan = $request->input('bulan');
        $tanggal = $request->input('tanggal');

        if ($tahun && $bulan && $tanggal) {
            $tglLahir = $tahun . '-' . $bulan . '-' . $tanggal;   
            try {
                $date = new \DateTime($tglLahir);
                $tglLahir = $date->format('Y-m-d');

                $today = new \DateTime();
                if ($date > $today) {
                    return back()->withErrors(['tanggal_lahir' => 'Tanggal lahir tidak boleh lebih dari hari ini.']);
                }
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
            'kota' => $request->input('kota'),
            'pekerjaan' => $request->input('pekerjaan'),
            'tgl_lahir_donatur' => $tglLahir,
            'gender' => $request->input('gender'),
        ]);
        
        $request->session()->forget('register1');
        
        return redirect()->route('login')->with('success', 'Profil berhasil diperbarui!');
    }
}