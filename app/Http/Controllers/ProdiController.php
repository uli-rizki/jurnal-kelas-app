<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Prodi;

class ProdiController extends Controller
{
    public function index()
    {
        $prodi = Prodi::get();

        return view('prodi.tampil', compact('prodi'));
    }

    public function tambah()
    {
        return view('prodi.tambah');
    }

    public function edit($prodi_id)
    {
        $prodi = Prodi::find($prodi_id);

        return view('prodi.edit', compact('prodi'));
    }

    public function simpan(Request $request)
    {
        $validation = $request->validate([
            'nama_prodi' => 'required',
            'nama_pendek' => 'required'
        ]);

        #menambahkan data prodi baru
        $prodi = new Prodi;
        
        #mengisikan sesuai dengan kolom 
        $prodi->nama_prodi = $request->nama_prodi;
        $prodi->nama_pendek = $request->nama_pendek;

        # melakukan simpan ke database
        $simpan = $prodi->save();

        if($simpan) {
            # Jika simpan bernilai true
            return redirect()->back()->withSuccess('Data berhasil disimpan');
        } else {
            // Jika simpan bernilai salah
            return redirect()->back()->withError('Data Gagal disimpan');
        }
    }
}
