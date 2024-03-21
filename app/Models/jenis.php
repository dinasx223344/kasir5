<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis extends Model
{
    use HasFactory;

    protected $table = 'jenis';
    protected $guarded = [''];

    function menu()
    {
        return $this->hasMany(menu::class, 'jenis_id', 'id');
    }
}