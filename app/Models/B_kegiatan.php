<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class B_kegiatan extends Model
{
    use HasFactory;
    protected $table = 'b_kegiatan';
    public function j_kegiatan()
    {
        return $this->belongsTo('App\Models\J_kegiatan', 'j_id', 'id');
    }
    public function rkm()
    {
        return $this->hasMany('App\Models\Rkm', 'b_id', 'id');
    }
    public function usulan()
    {
        return $this->hasMany('App\Models\Usulan', 'b_id', 'id');
    }
}
