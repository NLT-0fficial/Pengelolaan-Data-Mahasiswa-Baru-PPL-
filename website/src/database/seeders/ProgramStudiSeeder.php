<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('program_studis')->insert([
            [
                'nama_prodi' => 'Teknik Informatika',
                'fakultas' => 'Fakultas Ilmu Komputer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_prodi' => 'Ekonomi dan Bisnis',
                'fakultas' => 'Fakultas Ekonomi dan Bisnis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_prodi' => 'Kedokteran',
                'fakultas' => 'Fakultas Kedokteran',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}