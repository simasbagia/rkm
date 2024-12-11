<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $table = "unit";
    protected $fillable = ['nama_unit', 'singkatan'];

    public function Siswa()
    {
        return $this->hasMany('App\Models\Siswa', 'id_unit', 'id');
    }
}
