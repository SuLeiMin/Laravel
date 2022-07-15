<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mtkessai extends Model
{
    use HasFactory;
    protected $table = "mtkessai";

    protected $fillable = [
        "kessai_code",
        "kessai",
    ];
}
