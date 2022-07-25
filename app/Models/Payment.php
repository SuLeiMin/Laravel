<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function employees()
    {
        return $this->hasMany(Mtemployees::class);
    }
    
    public function mtshimebi()
    {
        return $this->belongsTo(Mtshimebi::class);
    }
}
