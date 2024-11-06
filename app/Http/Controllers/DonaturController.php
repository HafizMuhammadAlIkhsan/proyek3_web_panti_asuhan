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
}