<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class W_link extends Model
{
    use HasFactory;

    protected $table = "w_link";
    protected $guarded = [];
    public function wlinks()
    {
        return $this->hasMany('App\Models\W_links', 'subjudul_id', 'id');
    }
}
