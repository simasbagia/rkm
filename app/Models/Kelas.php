<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = "kelas";
    protected $fillable = ['nama_kelas', 'deskripsi'];

    public function Siswa()
    {
        return $this->hasMany('App\Models\Siswa', 'id_kelas', 'id');
    }
}
