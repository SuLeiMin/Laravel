<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "name",
        "zip_code",
        "address1",
        "address2",
        "telephone",
        "dept1",
        "dept2",
        "in_charge_id",
        "payment_method",
        //"deadline1",
        //"deadline2",
        "remark",
        "noti",
    ];
}
