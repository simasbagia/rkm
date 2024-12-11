<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P_kegiatan extends Model
{
    use HasFactory;
    protected $table = 'p_kegiatan';

    public function usulan()
    {
        return $this->hasMany('App\Models\Usulan', 'p_id', 'id');
    }
}
