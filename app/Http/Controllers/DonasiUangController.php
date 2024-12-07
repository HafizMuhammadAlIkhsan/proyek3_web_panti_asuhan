<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonasiUang;
use App\Models\Rekening;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\ProgramPanti;

class DonasiUangController extends Controller
{

    public function FormUmum()
    {
        $programs = ProgramPanti::all();
        $rekening = Rekening::where('status', true)->get();
        return view('Masyarakat_Umum/masyarakat_umum_donasi_uang_tunai', compact('programs', 'rekening'));
    }

    public function FormDonatur()
    {
        $programs = ProgramPanti::all();
        $rekening = Rekening::where('status', true)->get();
        return view('Donatur/donatur_donasi_uang_tunai', compact('programs', 'rekening'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jumlah_uang' => 'required|numeric|gt:0',
            'cara_pembayaran' => 'required|string|max:30',
            'id_program' => 'required|exists:program_panti,id_program',
        ], [
            'jumlah_uang.gt' => 'Jumlah uang harus lebih besar dari 0.',
        ]);

        try {
            $buktiTransferPath = $request->file('bukti_transfer')->store('public/bukti_transfer');
            $email = Auth::check() ? Auth::guard('donatur')->user()->email : 'anonim@example.com';
            DonasiUang::create([
                'email' => $email,
                'jumlah_uang' => $request->input('jumlah_uang'),
                'cara_pembayaran' => $request->input('cara_pembayaran'),
                'id_program' => $request->input('id_program'),
                'tanggal_donasi_uang' => now(),
                'bukti_transfer' => $buktiTransferPath,
                'status' => 'Diproses',
            ]);

            return redirect()->back()->with('success', 'Donasi berhasil dikirim untuk diverifikasi.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses donasi.');
        }
    }



    public function store_donatur(Request $request)
    {
        $email = Auth::guard('donatur')->user()->email;
        $request->validate([
            'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jumlah_uang' => 'required|numeric|gt:0',
            'cara_pembayaran' => 'required|string|max:30',
            'id_program' => 'required|exists:program_panti,id_program',
        ], [
            'jumlah_uang.gt' => 'Jumlah uang harus lebih besar dari 0.',
        ]);

        try {
            $buktiTransferPath = $request->file('bukti_transfer')->store('public/bukti_transfer');
            Log::info('File path: ' . $buktiTransferPath);

            DonasiUang::create([
                'email' => $email,
                'jumlah_uang' => $request->input('jumlah_uang'),
                'cara_pembayaran' => $request->input('cara_pembayaran'),
                'id_program' => $request->input('id_program'),
                'tanggal_donasi_uang' => now(),
                'bukti_transfer' => $buktiTransferPath,
                'status' => 'Diproses',
            ]);

            return redirect()->back()->with('success', 'Donasi berhasil dikirim untuk diverifikasi.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses donasi.');
        }
    }


    public function AmbilDataUang_Riwayat()
    {
        $donasiUang = DonasiUang::join('donatur', 'donasi_uang.email', '=', 'donatur.email')
            ->leftJoin('admin', 'donasi_uang.email_admin', '=', 'admin.email_admin')
            ->select('donasi_uang.*', 'donatur.username as donatur_nama', 'donatur.email as donatur_email')
            ->where('donatur.email', 'sulthan@example.com') //  Ganti jadi yang di session nya
            ->orderBy('donasi_uang.updated_at', 'asc') //  updated_at asc
            ->paginate(5);

        return view('Donatur/riwayat_donasi_uang', ['donasiUang' => $donasiUang]);
    }

    public function AmbilDataUang_Admin()
    {
        $donasiUang = DonasiUang::join('donatur', 'donasi_uang.email', '=', 'donatur.email')
            ->leftJoin('admin', 'donasi_uang.email_admin', '=', 'admin.email_admin')
            ->select('donasi_uang.*', 'donatur.username as donatur_nama', 'donatur.email as donatur_email','admin.email_admin as admin_email','admin.nama_pengurus as nama_admin')
            ->orderBy('donasi_uang.updated_at', 'desc') //  updated_at asc
            ->paginate(5);

        return view('Admin/list_uang', ['donasiUang' => $donasiUang]);
    }

    public function UpdateDataUang(Request $request, $id)
    {
        $donasiUang = DonasiUang::findOrFail($id);
        $admin = Auth::guard('admin')->user();

        $request->validate([
            'status' => 'required|string|max:255',
        ]);

        // Update status
        $donasiUang->email_admin = $admin->email_admin;
        $donasiUang->status = $request->input('status');
        $donasiUang->save();

        return response()->json(['message' => 'Status berhasil diperbarui']);
    }

    public function HapusDataUang($id)
    {
        $donasi = DonasiUang::find($id);

        if ($donasi) {
            $donasi->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data Uang berhasil dihapus.'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Uang tidak ditemukan.'
            ], 404);
        }
    }
}
