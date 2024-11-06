<?php

namespace App\Http\Controllers;

use App\Models\dataAnak;
use Illuminate\Http\Request;

class dataAnakController extends Controller
{   
    public function index_masyarakat()
    {
        $data_anak = dataAnak::orderBy('tanggal_lahir', 'desc')->paginate(7); 
        return view ('Masyarakat_Umum.data_anak')->with ('data_anak', $data_anak);       
    }

    public function index_donatur()
    {
        $data_anak = dataAnak::orderBy('tanggal_lahir', 'desc')->paginate(7); 
        return view ('Donatur.data_anak')->with ('data_anak', $data_anak);       
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_anak = dataAnak::orderBy('tanggal_lahir', 'desc')->paginate(7); 
        return view ('admin.dataAnak.data_anak')->with ('data_anak', $data_anak);       
    }

    public function create( )
    {
        return view ('admin.dataAnak.data_anak_create');
    }
    
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_anak' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:10',
            'pendidikan' => 'required|string|max:100',
            'status_ortu' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
        ]);

        // Buat data anak baru
        $dataAnak = dataAnak::create($validatedData);
        
        return redirect()->route('admin-data-anak-create')->with('success', 'Data telah tersimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Cari data anak berdasarkan ID
        $dataAnak = dataAnak::find($id);

        if ($dataAnak) {
            return response()->json($dataAnak);
        } else {
            return response()->json(['message' => 'Data anak tidak ditemukan'], 404);
        }
    }

    public function updateView($id)
    {
        $data_anak = dataAnak::where('id_anak', $id)->first();
        return view('admin.dataAnak.data_anak_edit')->with('data_anak', $data_anak);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
         // Validasi input
         $validatedData = $request->validate([
            'nama_anak' => 'sometimes|required|string|max:255',
            'jenis_kelamin' => 'sometimes|required|string|max:10',
            'pendidikan' => 'sometimes|required|string|max:100',
            'status_ortu' => 'sometimes|required|string|max:50',
            'tanggal_lahir' => 'sometimes|required|date',
        ]);

        // Cari data anak berdasarkan ID
        $dataAnak = dataAnak::find($id);

       
            // Update data anak
        $dataAnak->update($validatedData);

        return redirect()->route('admin-data-anak')->with('success', 'Data telah terupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dataAnak = dataAnak::findOrFail($id);

        if ($dataAnak) {
            $dataAnak->delete();
            return redirect()->to('admin/data-anak')->with('success', 'Berhasil melakukan delete data!');
        } else {
            return response()->json(['message' => 'Data anak tidak ditemukan'], 404);
        }
    }

    
}
