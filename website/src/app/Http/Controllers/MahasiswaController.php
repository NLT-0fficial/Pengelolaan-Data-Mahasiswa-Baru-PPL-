<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\ProgramStudi;
use App\Exports\MahasiswaExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class MahasiswaController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Tampil Data + Search
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $keyword = $request->search;

        $mahasiswa = Mahasiswa::with('programStudi')

        ->when($keyword,function($query) use($keyword){

            $query

            ->where(
                'nama',
                'like',
                "%$keyword%"
            )

            ->orWhere(
                'nim',
                'like',
                "%$keyword%"
            )

            ->orWhere(
                'email',
                'like',
                "%$keyword%"
            )

            ->orWhere(
                'semester',
                'like',
                "%$keyword%"
            )

            ->orWhereHas(
                'programStudi',
                function($q)
                use($keyword){

                    $q->where(
                        'nama_prodi',
                        'like',
                        "%$keyword%"
                    );

                }

            );

        })

        ->get();


        $programStudi =
        ProgramStudi::all();


        return view(
            'admin.mahasiswa.index',
            compact(
                'mahasiswa',
                'programStudi'
            )
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
        $request->validate([

            'program_studi_id'
            =>
            'required',

            'nim'
            =>
            'required|unique:mahasiswas',

            'nama'
            =>
            'required',

            'email'
            =>
            'required|email|unique:mahasiswas',

            'semester'
            =>
            'required',

            'status_akun'
            =>
            'required'

        ]);


        Mahasiswa::create([

            'program_studi_id'
            =>
            $request->program_studi_id,

            'nim'
            =>
            $request->nim,

            'nama'
            =>
            $request->nama,

            'alamat'
            =>
            'Belum diisi',

            'email'
            =>
            $request->email,

            'no_hp'
            =>
            '08123456789',

            'password'
            =>
            Hash::make(
                'password'
            ),

            'semester'
            =>
            $request->semester,

            'status_akun'
            =>
            $request->status_akun

        ]);


        return redirect(
            '/admin/mahasiswa'
        )

        ->with(
            'success',
            'Data berhasil ditambah'
        );
    }




    /*
    |--------------------------------------------------------------------------
    | Update Data
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        $id
    )
    {

        $mhs =
        Mahasiswa::findOrFail(
            $id
        );


        $mhs->update([

            'program_studi_id'
            =>
            $request->program_studi_id,

            'nama'
            =>
            $request->nama,

            'email'
            =>
            $request->email,

            'semester'
            =>
            $request->semester,

            'status_akun'
            =>
            $request->status_akun

        ]);


        return redirect(
            '/admin/mahasiswa'
        )

        ->with(
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
        Mahasiswa::findOrFail(
            $id
        );

        $mhs->delete();


        return redirect(
            '/admin/mahasiswa'
        )

        ->with(
            'success',
            'Data berhasil dihapus'
        );

    }




    /*
    |--------------------------------------------------------------------------
    | Generate NIM Otomatis
    |--------------------------------------------------------------------------
    */

    public function generateNim(
        Request $request
    )
    {

        $prodi =
        ProgramStudi::find(
            $request->program_studi_id
        );


        if(!$prodi){

            return response()->json([

                'nim'=>''

            ]);

        }



        if(
            $prodi->nama_prodi
            ==
            'Teknik Informatika'
        ){

            $prefix='TI';

        }

        elseif(
            $prodi->nama_prodi
            ==
            'Ekonomi dan Bisnis'
        ){

            $prefix='EB';

        }

        else{

            $prefix='KD';

        }



        $last =

        Mahasiswa::where(

            'program_studi_id',

            $prodi->id

        )

        ->latest()

        ->first();



        if($last){

            $angka=

            (int)

            substr(
                $last->nim,
                2
            );

            $angka++;

        }

        else{

            $angka=1;

        }



        $nim=

        $prefix .

        str_pad(

            $angka,

            4,

            '0',

            STR_PAD_LEFT

        );



        return response()->json([

            'nim'=>$nim

        ]);

    }
}