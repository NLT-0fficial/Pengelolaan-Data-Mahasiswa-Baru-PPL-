<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::with('programStudi')->get();

        return view('admin.mahasiswa.index', compact('mahasiswa'));
    }
}