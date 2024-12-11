<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    use HasFactory;

    protected $table = "widget";
    protected $fillable = ['judul', 'posisi', 'konten'];
    public function wlink()
    {
        return $this->hasMany('App\Models\W_link', 'widget_id', 'id');
    }
}
