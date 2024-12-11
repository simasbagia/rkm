<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kk extends Model
{
    use HasFactory;
    protected $table = 'kk';
    protected $guarded = [];

    public function keluarga()
    {
        return $this->hasMany('App\Models\Keluarga', 'kk_id', 'id');
    }
    public function kel()
    {
        return $this->belongsTo('App\Models\Kel', 'kel_id', 'id');
    }
}
