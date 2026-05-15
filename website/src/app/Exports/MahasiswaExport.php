<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;

use Maatwebsite\Excel\Events\AfterSheet;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;

class MahasiswaExport implements
    FromCollection,
    WithHeadings,
    ShouldAutoSize,
    WithStyles,
    WithEvents
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

                $mhs->semester,

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

            'Semester',

            'Email',

            'Status'

        ];
    }


    public function styles(
        Worksheet $sheet
    )
    {

        return [

            1 => [

                'font' => [

                    'bold' => true,
                    'size' => 12

                ],

                'alignment' => [

                    'horizontal' => 'center',
                    'vertical' => 'center'

                ]

            ]

        ];

    }



    public function registerEvents(): array
    {

        return [

            AfterSheet::class => function(
                AfterSheet $event
            ){

                $sheet =
                $event
                ->sheet
                ->getDelegate();



                /*
                |--------------------------------------------------------------------------
                | Dropdown Program Studi
                |--------------------------------------------------------------------------
                */

                for(
                    $i=2;
                    $i<=100;
                    $i++
                ){

                    $validation =
                    $sheet
                    ->getCell(
                        'C'.$i
                    )
                    ->getDataValidation();

                    $validation
                    ->setType(
                        DataValidation::TYPE_LIST
                    );

                    $validation
                    ->setErrorStyle(
                        DataValidation::STYLE_INFORMATION
                    );

                    $validation
                    ->setAllowBlank(false);

                    $validation
                    ->setShowDropDown(true);

                    $validation
                    ->setFormula1(
                        '"Teknik Informatika,Ekonomi dan Bisnis,Kedokteran"'
                    );

                }



                /*
                |--------------------------------------------------------------------------
                | Dropdown Semester
                |--------------------------------------------------------------------------
                */

                for(
                    $i=2;
                    $i<=100;
                    $i++
                ){

                    $validation =
                    $sheet
                    ->getCell(
                        'D'.$i
                    )
                    ->getDataValidation();

                    $validation
                    ->setType(
                        DataValidation::TYPE_LIST
                    );

                    $validation
                    ->setErrorStyle(
                        DataValidation::STYLE_INFORMATION
                    );

                    $validation
                    ->setAllowBlank(false);

                    $validation
                    ->setShowDropDown(true);

                    $validation
                    ->setFormula1(
                        '"1,2,3,4,5,6,7,8,9,10,11,12,13,14"'
                    );

                }



                /*
                |--------------------------------------------------------------------------
                | Dropdown Status
                |--------------------------------------------------------------------------
                */

                for(
                    $i=2;
                    $i<=100;
                    $i++
                ){

                    $validation =
                    $sheet
                    ->getCell(
                        'F'.$i
                    )
                    ->getDataValidation();

                    $validation
                    ->setType(
                        DataValidation::TYPE_LIST
                    );

                    $validation
                    ->setErrorStyle(
                        DataValidation::STYLE_INFORMATION
                    );

                    $validation
                    ->setAllowBlank(false);

                    $validation
                    ->setShowDropDown(true);

                    $validation
                    ->setFormula1(
                        '"Aktif,Nonaktif"'
                    );

                }

            }

        ];

    }

}