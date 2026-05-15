<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\ProgramStudi;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];

        $ti = ProgramStudi::where('nama_prodi', 'Teknik Informatika')->first();
        $eb = ProgramStudi::where('nama_prodi', 'Ekonomi dan Bisnis')->first();
        $kd = ProgramStudi::where('nama_prodi', 'Kedokteran')->first();

        // Teknik Informatika (cowok dominan)
        $tiNama = [
            'Rizky Pratama',
            'Muhammad Fajar',
            'Andi Saputra',
            'Dimas Ramadhan',
            'Rafi Maulana',
            'Arif Hidayat',
            'Bagas Nugroho',
            'Ayu Lestari',
            'Putri Amelia',
            'Nadia Safitri'
        ];

        foreach ($tiNama as $i => $nama) {

            $username = strtolower(explode(' ', $nama)[0]);
            $random = rand(100,999);

            $data[] = [
                'program_studi_id' => $ti->id,
                'nim' => 'TI00'.($i+1),
                'nama' => $nama,
                'alamat' => 'Jl. Informatika No '.($i+1),
                'email' => $username.$random.'@gmail.com',
                'no_hp' => '081234560'.($i+1),
                'password' => Hash::make('password'),
                'status_akun' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Ekonomi dan Bisnis (cewek dominan)
        $ebNama = [
            'Citra Maharani',
            'Nabila Putri',
            'Salsa Aulia',
            'Amanda Putri',
            'Indah Sari',
            'Aisyah Rahma',
            'Tiara Ayu',
            'Budi Santoso',
            'Kevin Wijaya',
            'Rian Setiawan'
        ];

        foreach ($ebNama as $i => $nama) {

            $username = strtolower(explode(' ', $nama)[0]);
            $random = rand(100,999);

            $data[] = [
                'program_studi_id' => $eb->id,
                'nim' => 'EB00'.($i+1),
                'nama' => $nama,
                'alamat' => 'Jl. Ekonomi No '.($i+1),
                'email' => $username.$random.'@gmail.com',
                'no_hp' => '081234561'.($i+1),
                'password' => Hash::make('password'),
                'status_akun' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Kedokteran (balance)
        $kdNama = [
            'Daniel Christian',
            'Rangga Prakoso',
            'Yoga Prasetyo',
            'Fikri Akbar',
            'Reza Mahendra',
            'Dewi Anggraini',
            'Siti Nurhaliza',
            'Anisa Putri',
            'Maya Salsabila',
            'Kartika Dewi'
        ];

        foreach ($kdNama as $i => $nama) {

            $username = strtolower(explode(' ', $nama)[0]);
            $random = rand(100,999);

            $data[] = [
                'program_studi_id' => $kd->id,
                'nim' => 'KD00'.($i+1),
                'nama' => $nama,
                'alamat' => 'Jl. Kedokteran No '.($i+1),
                'email' => $username.$random.'@gmail.com',
                'no_hp' => '081234562'.($i+1),
                'password' => Hash::make('password'),
                'status_akun' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('mahasiswas')->insert($data);
    }
}