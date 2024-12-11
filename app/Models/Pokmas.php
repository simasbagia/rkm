<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokmas extends Model
{
    use HasFactory;
    
    protected $table = "pokmas";
    protected $fillable = ['pokmas', 'tanggal_buka', 'tanggal_tutup'];

    public function kel(){
        return $this->belongsTo('App\Models\Kel', 'kel_id', 'id' );
    }
    public function periode(){
        return $this->belongsTo('App\Models\Periode', 'periode_id', 'id' );
    }
    public function rt(){
        return $this->hasMany('App\Models\Rt', 'pokmas_id', 'id' );
    }
    public function usulan()
    {
        return $this->hasMany('App\Models\Usulan', 'pokmas_id', 'id');
    }
}
