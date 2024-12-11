<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Realisasi extends Model
{
    protected $table = 'realisasi';
    public function usulan()
    {
        return $this->belongsTo('App\Models\Usulan', 'usulan_id', 'id');
    }
}
