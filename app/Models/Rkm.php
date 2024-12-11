<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rkm extends Model
{
    use HasFactory;
    protected $table = 'rkm';
    public function periode()
    {
        return $this->belongsTo('App\Models\Periode', 'tahun_id', 'id');
    }
    public function rt()
    {
        return $this->belongsTo('App\Models\Rt', 'rt_id', 'id');
    }
    public function b_kegiatan()
    {
        return $this->belongsTo('App\Models\B_kegiatan', 'b_id', 'id');
    }
    public function j_kegiatan()
    {
        return $this->belongsTo('App\Models\J_kegiatan', 'j_id', 'id');
    }
    public function p_kegiatan()
    {
        return $this->belongsTo('App\Models\P_kegiatan', 'p_id', 'id');
    }
    public function usulan()
    {
        return $this->hasMany('App\Models\Usulan', 'rkm_id', 'id');
    }
}
