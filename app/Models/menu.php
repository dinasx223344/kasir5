<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;

    protected $table = 'menu';
    protected $guarded = ['id'];

    public function jenis()
    {
        return $this->belongsTo(jenis::class, 'jenis_id', 'id');
    }

    function stok()
    {
        return $this->hasMany(stok::class, 'menu_id', 'id');
    }
}
