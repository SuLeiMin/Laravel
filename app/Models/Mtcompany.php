<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mtcompany extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'mtcompany';
    
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
        "billingdate",
        "paymentdate",
        "remark",
        "remark2",
        "remark3",
        "noti",
    ];

    public function dtkoyoujyouken() {
        return $this->hasMany('App\dtkoyoujyouken');
    }
}
