<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    protected $fillable = [
        'nama_prodi',
        'fakultas',
    ];

    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}