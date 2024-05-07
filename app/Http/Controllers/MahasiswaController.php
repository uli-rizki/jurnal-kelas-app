<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::get();

        return view('mahasiswa.tampil', compact('mahasiswa'));
    }
}
