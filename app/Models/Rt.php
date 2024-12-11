<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rt extends Model
{
    use HasFactory;
    protected $table = 'rt';
    protected $guarded = ['id'];
    public function pendamping()
    {
        return $this->belongsTo('App\Models\User', 'pendamping_id', 'id');
    }
    public function rw()
    {
        return $this->belongsTo('App\Models\Rw', 'rw_id', 'id');
    }
    public function kel()
    {
        return $this->belongsTo('App\Models\Kel', 'kel_id', 'id');
    }
    public function kec()
    {
        return $this->belongsTo('App\Models\Kec', 'kec_id', 'id');
    }
    public function pokmas()
    {
        return $this->belongsTo('App\Models\Pokmas', 'pokmas_id', 'id');
    }
    public function usulan()
    {
        return $this->hasMany('App\Models\Usulan', 'rt_id', 'id');
    }
    public function kk()
    {
        return $this->hasMany('App\Models\Kk', 'rt_id', 'id');
    }
    public function keluarga()
    {
        return $this->hasMany('App\Models\Keluarga', 'rt_id', 'id');
    }
    public function umkm()
    {
        return $this->hasMany('App\Models\Umkm', 'rt_id', 'id');
    }
    public function kkm()
    {
        return $this->hasMany('App\Models\Kkm', 'rt_id', 'id');
    }
    public function potensi()
    {
        return $this->hasMany('App\Models\Potensi', 'rt_id', 'id');
    }
    public function sumbangan()
    {
        return $this->hasMany('App\Models\Sumbangan', 'rt_id', 'id');
    }
}
