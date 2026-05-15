<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MahasiswaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Mahasiswa::with('programStudi')
            ->get()
            ->map(function ($mhs) {

                return [

                    $mhs->nim,
                    $mhs->nama,
                    $mhs->programStudi->nama_prodi,
                    $mhs->email,
                    $mhs->status_akun

                ];
            });
    }

    public function headings(): array
    {
        return [

            'NIM',
            'Nama',
            'Program Studi',
            'Email',
            'Status'

        ];
    }
}