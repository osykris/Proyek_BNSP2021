<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class arsip_surat extends Model
{

    public function category()
    {
        return $this->belongsTo(kategori::class, 'kategori_id', 'id');
    }
}
