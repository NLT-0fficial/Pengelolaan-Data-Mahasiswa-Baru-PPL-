<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = [

        'program_studi_id',
        'nim',
        'nama',
        'alamat',
        'email',
        'no_hp',
        'semester',
        'password',
        'status_akun',

    ];

    public function programStudi()
    {
        return $this->belongsTo(
            ProgramStudi::class
        );
    }
}