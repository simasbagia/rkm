<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usulan extends Model
{
    use HasFactory;
    protected $table = 'usulan';
    public function rkm()
    {
        return $this->belongsTo('App\Models\Rkm', 'rkm_id', 'id');
    }
    public function rw()
    {
        return $this->belongsTo('App\Models\Rw', 'rw_id', 'id');
    }
    public function p_id()
    {
        return $this->belongsTo('App\Models\P_kegiatan', 'p_id', 'id');
    }
    public function j_id()
    {
        return $this->belongsTo('App\Models\J_kegiatan', 'j_id', 'id');
    }
    public function b_id()
    {
        return $this->belongsTo('App\Models\P_kegiatan', 'b_id', 'id');
    }
    public function realisasi()
    {
        return $this->hasMany('App\Models\Realisasi', 'usulan_id', 'id');
    }
}


