<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        // Teknik Informatika
        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'program_studi_id' => 1,
                'nim' => 'TI00' . $i,
                'nama' => 'Mahasiswa TI ' . $i,
                'alamat' => 'Alamat TI ' . $i,
                'email' => 'ti' . $i . '@gmail.com',
                'no_hp' => '0812345600' . $i,
                'password' => Hash::make('password'),
                'status_akun' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Ekonomi dan Bisnis
        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'program_studi_id' => 2,
                'nim' => 'EB00' . $i,
                'nama' => 'Mahasiswa EB ' . $i,
                'alamat' => 'Alamat EB ' . $i,
                'email' => 'eb' . $i . '@gmail.com',
                'no_hp' => '0812345610' . $i,
                'password' => Hash::make('password'),
                'status_akun' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Kedokteran
        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'program_studi_id' => 3,
                'nim' => 'KD00' . $i,
                'nama' => 'Mahasiswa KD ' . $i,
                'alamat' => 'Alamat KD ' . $i,
                'email' => 'kd' . $i . '@gmail.com',
                'no_hp' => '0812345620' . $i,
                'password' => Hash::make('password'),
                'status_akun' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('mahasiswas')->insert($data);
    }
}