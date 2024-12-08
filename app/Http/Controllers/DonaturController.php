<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donatur;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
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
            'tahun_lahir' => $donatur->tgl_lahir_donatur ? date('Y', strtotime($donatur->tgl_lahir_donatur)) : null,
            'bulan_lahir' => $donatur->tgl_lahir_donatur ? date('m', strtotime($donatur->tgl_lahir_donatur)) : null,
            'hari_lahir' => $donatur->tgl_lahir_donatur ? date('d', strtotime($donatur->tgl_lahir_donatur)) : null,
        ];

        return view('Donatur.profile_donatur', compact('profileData'));
        
    }

    public function updateProfile(Request $request)
    {
        $gender = $request->gender === '' || $request->gender === null ? null : filter_var($request->gender, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
        
        $request->merge([
            'bulan_lahir' => (int) $request->bulan_lahir,
            'hari_lahir' => (int) $request->hari_lahir,
            'gender' => $gender,
        ]);
        
        $request->validate([
            'username' => 'required|string|max:50',
            'nama_asli' => 'nullable|string|max:50|regex:/^[a-zA-Z\s]+$/',
            'nomor_handphone' => 'required|digits_between:1,12',
            'tahun_lahir' => 'nullable|numeric|min:1900|max:' . now()->year,
            'bulan_lahir' => 'nullable|numeric',
            'hari_lahir' => 'nullable|numeric',
            'pekerjaan' => 'nullable|string|max:50',
            'gender' => 'nullable|boolean',
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.max' => 'Username maksimal 50 karakter.',
            'nama_asli.regex' => 'Nama asli hanya boleh mengandung huruf dan spasi.',
            'nama_asli.max' => 'Nama asli tidak boleh lebih dari 50 karakter.',
            'nomor_handphone.required' => 'Nomor handphone harus diisi.',
            'nomor_handphone.digits_between' => 'Nomor Handphone maksimal 12 digit.',
            'hari_lahir.numeric' => 'Hari lahir harus berupa angka.',
            'pekerjaan.max' => 'Nama Pekerjaan tidak boleh lebih dari 50 karakter.',
            'gender.boolean' => 'Jenis kelamin tidak valid.',
        ]);
        
        $tanggal_lahir = Carbon::create($request->tahun_lahir, $request->bulan_lahir, $request->hari_lahir);
        if ($tanggal_lahir > now()) {
            return redirect()->back()->withErrors(['tgl_lahir' => 'Tanggal lahir tidak boleh lebih dari hari ini.']);
        }
        
        $donatur = Donatur::where('email', Auth::guard('donatur')->user()->email)->first();
    
        if (!$donatur) {
            return redirect()->back()->withErrors('Donatur tidak ditemukan.');
        }
    
        $donatur->username = $request->username;
        $donatur->nama_asli = $request->nama_asli;
        $donatur->kontak = $request->nomor_handphone;
        $donatur->pekerjaan = $request->pekerjaan;
        $donatur->gender = $request->gender;

        if ($request->tahun_lahir && $request->bulan_lahir && $request->hari_lahir) {
            $donatur->tgl_lahir_donatur = sprintf('%04d-%02d-%02d', $request->tahun_lahir, $request->bulan_lahir, $request->hari_lahir);
        } else {
            $donatur->tgl_lahir_donatur = null;
        }
    
        if ($donatur->save()) {
            return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
        } else {
            return redirect()->back()->withErrors('Gagal memperbarui profil.');
        }
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
}