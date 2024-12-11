<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;
    
    protected $table = 'keluarga';
    protected $guarded = [];
    public function kk()
    {
        return $this->belongsTo('App\Models\Kk', 'kk_id', 'id');
    }
    // public function usia(){
    //     return Carbon::parse($tgl_lahir)->age;
    // }
    public function getUsiaAttribute() {
        return Carbon::parse($this->tgl_lahir)->age;
    }
}
