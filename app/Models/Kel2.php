<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kel extends Model
{
    use HasFactory;
    protected $table = 'kel';
    public function dpt()
    {
        return $this->hasMany('App\Models\Dpt', 'kel_id', 'id');
    }
    public function kec()
    {
        return $this->belongsTo('App\Models\Kec', 'kec_id', 'id');
    }
    public function pokmas()
    {
        return $this->hasMany('App\Models\Pokmas', 'kel_id', 'id');
    }
    public function pendamping()
    {
        return $this->belongsTo('App\Models\User', 'pendamping_id', 'id');
    }
}
