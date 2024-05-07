<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::with('prodi')->get();
        /**
         * SELECT * FROM mahasiswa
         * JOIN prodi ON mahasiswa.prodi_id=prodi.prodi_id
         */
        // return response()->json($mahasiswa); exit;

        return view('mahasiswa.tampil', compact('mahasiswa'));
    }
}
