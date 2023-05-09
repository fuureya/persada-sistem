<?php

namespace App\Models;

use App\Http\Controllers\PendaftarSmkController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurusanModel extends Model
{
    use HasFactory;
    protected $table = "jurusan";
    protected $guarded = ["id"];

    public function pendaftar()
    {
        return $this->belongsTo(pendaftarSmkModel::class);
    }
}
