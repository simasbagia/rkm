<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dpt extends Model
{
    use HasFactory;
    protected $table = "dpt";
    public function kel()
    {
        return $this->belongsTo('App\Models\Kel', 'kel_id', 'id');
    }
}
