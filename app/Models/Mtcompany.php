<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mtcompany extends Model 
{
    use HasFactory, SoftDeletes;

    protected $table = "mtcompany";

    protected $fillable =
    [
        "company_name",
        "zipcode",
        "address1",
        "address2",
        "tel",
        "department1",
        "department2",
        "incharge_id",
        "kessai",
        "seikyu_shimebi",
        "shimebi",
        "kijitsu",
        "remark",
        "remark2",
        "remark3",
        "email_send"
    ];

    public function mtemployees()
    {
        return $this->belongsToMany(Mtemployees::class);
    }
}
