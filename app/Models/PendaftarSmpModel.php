<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftarSmpModel extends Model
{
    use HasFactory;
    protected $table = 'pendaftar_smp';
    protected $guarded = "id";

    public function getJurusan()
    {
        return $this->hasMany(pendaftarSmkModel::class, "pendaftar_smk");
    }
}


