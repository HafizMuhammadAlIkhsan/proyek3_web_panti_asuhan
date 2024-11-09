<?php
// app/Http/Controllers/DonasiController.php
namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\DonasiBarang;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function index()
    {
        return view('donasi.index');
    }

    public function jasaIndex()
    {
        return view('donasi.jasa');
    }

    public function donasi_barang(Request $r){
        $path = $r->file('bukti_foto')->storeAs('images', $r->file('bukti_foto')->getClientOriginalName(), 'public');
        $data = $r->all();
        $data['email']= auth()->user()?->email ?? 'aangkasarayaa@gmail.com';
        $data['email_admin'] = Admin::get()->first()->email_admin;
        $data['bukti_foto'] = $path;
        // dd($data);
        DonasiBarang::create($data);
        return back();
    }
}