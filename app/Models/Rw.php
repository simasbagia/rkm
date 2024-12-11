<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    use HasFactory;
    protected $table = 'rw';

   // public function rt()
   // {
   //     return $this->hasMany(Rt::class);
   // }
    public function kel()
    {
        return $this->belongsTo('App\Models\Kel', 'kel_id', 'id');
    }
    public function usulan()
    {
        return $this->hasMany('App\Models\Usulan', 'rw_id', 'id');
    }
    public function rt()
    {
        return $this->hasMany('App\Models\Rt', 'rw_id', 'id');
    }
    public function kk()
    {
        return $this->hasMany('App\Models\Kk', 'rw_id', 'id');
    }
    public function keluarga()
    {
        return $this->hasMany('App\Models\Keluarga', 'rw_id', 'id');
    }
}
