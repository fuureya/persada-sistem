<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendaftarSmkModel extends Model
{
    use HasFactory;
    protected $table = "pendaftar_smk";
    protected $fillable = [
        "nama_pendaftar", 
        "jurusans_id", 
        "asal_sekolah", 
        "tanggal_lahir", 
        "nomor_wa", 
        "nama_wali", 
        "nomor_wa_wali"
    ];
    // protected $with = ["jurusan"];

    public function jurusan()
    {
        return $this->belongsTo(jurusanModel::class, "jurusans_id", "id");
    }
}
