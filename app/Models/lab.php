<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lab extends Model
{
    protected $table = "lab";
    protected $guarded = ["id"];
    use HasFactory;
}
