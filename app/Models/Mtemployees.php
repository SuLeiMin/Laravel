<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mtemployees extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "mtemployees";

    public function mtcompanies()
    {
        return $this->belongsToMany(Mtcompany::class);
    }

    public function incharge(){
        return $this->belongsTo(Incharge::class);
    }

    public function billing(){
        return $this->belongsTo(Billing::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }
}
