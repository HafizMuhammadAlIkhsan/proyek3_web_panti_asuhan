<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donatur;
use Illuminate\Support\Facades\Auth;

class DonaturController extends Controller
{
    public function showProfile()
    {
        $donatur = Auth::guard('donatur')->user();

        
        $tanggalLahir = $donatur->tgl_lahir_donatur ? explode('-', $donatur->tgl_lahir_donatur) : [null, null, null];

        if ($donatur) {
            $profileData = [
                'email' => $donatur->email,
                'username' => $donatur->username,
                'nama_asli' => $donatur->nama_asli,
                'kontak' => $donatur->kontak,
                // 'tanggal_lahir' => $donatur->tgl_lahir_donatur,
                'tahun_lahir' => $tanggalLahir[0],
                'bulan_lahir' => $tanggalLahir[1],
                'hari_lahir' => $tanggalLahir[2],
                'pekerjaan' => $donatur->pekerjaan,
                'gender' => $donatur->gender,
            ];
            return view('Donatur.profile_donatur', compact('profileData'));
        }
    }

    public function showEmail()
    {
        $donatur = Auth::guard('donatur')->user();

        if ($donatur) {
            $profileData = [
                'email' => $donatur->email,
            ];
            return view('components.sidebardonatur', compact('profileData'));
        }
    }

    public function updateProfile(Request $request)
    {
        // dd($request->all());
        $donatur = Donatur::where('email', Auth::guard('donatur')->user()->email)->first();
        // dd($donatur);

    
        // Validasi input
        $request->validate([
            'username' => 'required|string|max:255',
            'nama_asli' => 'required|string|max:255',
            'kontak' => 'nullable|string|max:15',
            'tahun_lahir' => 'required|integer',
            'bulan_lahir' => 'required|integer',
            'hari_lahir' => 'required|integer',
            'pekerjaan' => 'nullable|string|max:255',
            'gender' => 'required|boolean',
        ]);
        dd($donatur);
    
        // Update data donatur
        $donatur->update([
            'username' => $request->username,
            'nama_asli' => $request->nama_asli,
            'kontak' => $request->kontak,
            'tgl_lahir_donatur' => $request->tahun_lahir . '-' . str_pad($request->bulan_lahir, 2, '0', STR_PAD_LEFT) . '-' . str_pad($request->hari_lahir, 2, '0', STR_PAD_LEFT),
            'pekerjaan' => $request->pekerjaan,
            'gender' => $request->gender === 'true',  // Pastikan gender disesuaikan
        ]);
        // $donatur->username = $request->username;
        // $donatur->nama_asli = $request->nama_asli;
        // $donatur->kontak = $request->kontak;
        // $donatur->tgl_lahir_donatur = $request->tahun_lahir . '-' . str_pad($request->bulan_lahir, 2, '0', STR_PAD_LEFT) . '-' . str_pad($request->hari_lahir, 2, '0', STR_PAD_LEFT);
        // $donatur->pekerjaan = $request->pekerjaan;
        // $donatur->gender = $request->gender;
        // $donatur->save();
        dd($donatur);
    
        return redirect()->route('hal_profile_donatur.update.post')->with('success', 'Profil berhasil diperbarui.');
    }
    
}