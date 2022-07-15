<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'userlist';
   
    protected $fillable = [
        "user_id",
        "company_id",
        "username",
        "department1",
        "department2",
        "password",
        "noti",
    ];
}
