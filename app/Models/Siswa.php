<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = "siswa";
    protected $guarded = [];


    public function pendaftar()
    {
        return $this->belongsTo('App\Models\Pendaftar', 'pendaftar_id', 'id');
    }

    public function periode()
    {
        return $this->belongsTo('App\Models\Periode', 'periode_id', 'id');
    }
}
