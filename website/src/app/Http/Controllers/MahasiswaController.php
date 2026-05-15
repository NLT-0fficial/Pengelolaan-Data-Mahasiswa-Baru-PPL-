<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Exports\MahasiswaExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa =
        Mahasiswa::with('programStudi')->get();

        return view(
            'admin.mahasiswa.index',
            compact('mahasiswa')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Export Excel
    |--------------------------------------------------------------------------
    */

    public function export()
    {
        return Excel::download(
            new MahasiswaExport,
            'laporan_mahasiswa.xlsx'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Tambah Data
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        Mahasiswa::create($request->all());

        return redirect(
            '/admin/mahasiswa'
        )->with(
            'success',
            'Data berhasil ditambah'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Edit Data
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        $id
    )
    {
        $mhs =
        Mahasiswa::findOrFail($id);

        $mhs->update(
            $request->all()
        );

        return redirect(
            '/admin/mahasiswa'
        )->with(
            'success',
            'Data berhasil diupdate'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Hapus Data
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $mhs =
        Mahasiswa::findOrFail($id);

        $mhs->delete();

        return redirect(
            '/admin/mahasiswa'
        )->with(
            'success',
            'Data berhasil dihapus'
        );
    }
}