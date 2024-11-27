<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donatur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DonaturController extends Controller
{
    public function showProfile()
    {
        $donatur = Auth::guard('donatur')->user();

        $tanggalLahir = $donatur->tgl_lahir_donatur ? explode('-', $donatur->tgl_lahir_donatur) : [null, null, null];

        $profileData = [
            'email' => $donatur->email,
            'username' => $donatur->username,
            'nama_asli' => $donatur->nama_asli,
            'kontak' => $donatur->kontak,
            'tgl_lahir_donatur' => $donatur->tgl_lahir_donatur,
            'pekerjaan' => $donatur->pekerjaan,
            'gender' => $donatur->gender,
            // Mengambil tahun, bulan, dan hari dari tgl_lahir_donatur
            'tahun_lahir' => $donatur->tgl_lahir_donatur ? date('Y', strtotime($donatur->tgl_lahir_donatur)) : null,
            'bulan_lahir' => $donatur->tgl_lahir_donatur ? date('m', strtotime($donatur->tgl_lahir_donatur)) : null,
            'hari_lahir' => $donatur->tgl_lahir_donatur ? date('d', strtotime($donatur->tgl_lahir_donatur)) : null,
        ];
        return view('Donatur.profile_donatur', compact('profileData'));
        
    }

    public function showEmail()
    {
        $donatur = Auth::guard('donatur')->user();

        if ($donatur) {
            $profileData = [
                'email' => $donatur->username,
            ];
            return view('components.sidebardonatur', compact('profileData'));
        }
    }

    public function updateProfile(Request $request)
    {
        // Debug jika perlu
        // dd($request->all());
        
        $request->merge([
            'bulan_lahir' => (int) $request->bulan_lahir,
            'hari_lahir' => (int) $request->hari_lahir,
            'gender' => filter_var($request->gender, FILTER_VALIDATE_BOOLEAN),
        ]);
        $request->validate([
            'username' => 'required|string|max:50',
            'nama_asli' => 'nullable|string|max:50',
            'nomor_handphone' => 'required|digits_between:1,12',
            'tahun_lahir' => 'required|integer|min:1900|max:' . now()->year,
            'bulan_lahir' => 'required|numeric|min:1|max:12',
            'hari_lahir' => 'required|numeric|min:1|max:31',
            'pekerjaan' => 'nullable|string|max:50',
            'gender' => 'required|boolean',
        ]);
    
        $donatur = Donatur::where('email', Auth::guard('donatur')->user()->email)->first();
    
        if (!$donatur) {
            return redirect()->back()->withErrors('Donatur tidak ditemukan.');
        }
    
        $donatur->username = $request->username;
        $donatur->nama_asli = $request->nama_asli;
        $donatur->kontak = $request->nomor_handphone;
        $donatur->pekerjaan = $request->pekerjaan;
        $donatur->gender = $request->gender;
        $donatur->tgl_lahir_donatur = sprintf('%04d-%02d-%02d', $request->tahun_lahir, $request->bulan_lahir, $request->hari_lahir);
    
        if ($donatur->save()) {
            return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
        }
    
        return redirect()->back()->withErrors('Terjadi kesalahan saat memperbarui profil.');
    }
    
    public function RiwayatDonasi()
{
    $emailDonatur = Auth::guard('donatur')->user()->email;

    $barang = DB::table('donatur')
        ->join('donasi_barang', 'donatur.email', '=', 'donasi_barang.email')
        ->where('donatur.email', $emailDonatur)
        ->selectRaw("
            donatur.username AS nama_donatur,
            'Barang' AS jenis_donasi,
            donasi_barang.nama_barang AS nama_donasi,
            donasi_barang.jumlah_barang AS jumlah,
            donasi_barang.tanggal_verifikasi_barang AS tanggal,
            donasi_barang.status AS status_donasi
        ");

    $jasa = DB::table('donatur')
        ->join('donasi_jasa', 'donatur.email', '=', 'donasi_jasa.email')
        ->where('donatur.email', $emailDonatur)
        ->selectRaw("
            donatur.username AS nama_donatur,
            'Jasa' AS jenis_donasi,
            donasi_jasa.nama_jasa AS nama_donasi,
            NULL AS jumlah,
            donasi_jasa.jadwal_mulai AS tanggal,
            donasi_jasa.status AS status_donasi
        ");

    $uang = DB::table('donatur')
        ->join('donasi_uang', 'donatur.email', '=', 'donasi_uang.email')
        ->where('donatur.email', $emailDonatur)
        ->selectRaw("
            donatur.username AS nama_donatur,
            'Uang' AS jenis_donasi,
            CONCAT('Donasi ke program ', donasi_uang.id_program) AS nama_donasi,
            donasi_uang.jumlah_uang AS jumlah,
            donasi_uang.tanggal_donasi_uang AS tanggal,
            donasi_uang.status AS status_donasi
        ");

    $donasi = $barang
        ->unionAll($jasa)
        ->unionAll($uang)
        ->orderBy('tanggal', 'DESC')
        ->paginate(10);

    return view('Donatur/riwayat_donasi', ['donasi' => $donasi]);
}


    // public function updateProfile(Request $request)
    // {
    //     // dd($request->all());
    //     $donatur = Donatur::where('email', Auth::guard('donatur')->user()->email)->first();
    //     // dd($donatur);

    //     $request->validate([
    //         'username' => 'required|string|max:255',
    //         'nama_asli' => 'required|string|max:255',
    //         'kontak' => 'nullable|string|max:15',
    //         'tahun_lahir' => 'required|integer',
    //         'bulan_lahir' => 'required|integer',
    //         'hari_lahir' => 'required|integer',
    //         'pekerjaan' => 'nullable|string|max:255',
    //         'gender' => 'required|boolean',
    //     ]);
    //     // dd($donatur);
    
    //     // Update data donatur
    //     // $donatur->update([
    //     //     'username' => $request->username,
    //     //     'nama_asli' => $request->nama_asli,
    //     //     'kontak' => $request->kontak,
    //     //     'tgl_lahir_donatur' => $request->tahun_lahir . '-' . str_pad($request->bulan_lahir, 2, '0', STR_PAD_LEFT) . '-' . str_pad($request->hari_lahir, 2, '0', STR_PAD_LEFT),
    //     //     'pekerjaan' => $request->pekerjaan,
    //     //     'gender' => $request->gender === 'true',  // Pastikan gender disesuaikan
    //     // ]);
    //     $donatur->username = $request->username;
    //     $donatur->nama_asli = $request->nama_asli;
    //     $donatur->kontak = $request->kontak;
    //     $donatur->tgl_lahir_donatur = $request->tahun_lahir . '-' . str_pad($request->bulan_lahir, 2, '0', STR_PAD_LEFT) . '-' . str_pad($request->hari_lahir, 2, '0', STR_PAD_LEFT);
    //     $donatur->pekerjaan = $request->pekerjaan;
    //     $donatur->gender = $request->gender;
    //     $donatur->save();
    //     dd($donatur);
    
    //     return redirect()->route('hal_profile_donatur.update.post')->with('success', 'Profil berhasil diperbarui.');
    // }
    
}