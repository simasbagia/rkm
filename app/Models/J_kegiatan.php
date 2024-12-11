<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class J_kegiatan extends Model
{
    use HasFactory;
    protected $table = 'j_kegiatan';
    public function p_kegiatan()
    {
        return $this->belongsTo('App\Models\P_kegiatan', 'p_id', 'id');
    }
    public function usulan()
    {
        return $this->hasMany('App\Models\Usulan', 'j_id', 'id');
    }
}
