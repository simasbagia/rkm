<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kec extends Model
{
    use HasFactory;
    protected $table = "kec";
    protected $fillable = ['nama_kel'];

    public function kk()
    {
        return $this->hasMany('App\Models\Kk', 'kec_id', 'id');
    }
    public function keluarga()
    {
        return $this->hasMany('App\Models\Keluarga', 'kec_id', 'id');
    }
    public function usulan()
    {
        return $this->hasMany('App\Models\Usulan', 'kec_id', 'id');
    }
}
