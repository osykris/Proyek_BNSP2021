<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{

    public function spareparts()
    {
        return $this->hasMany(arsip_surat::class, 'kategori_id', 'id');
    }
}
