<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seller extends Model
{
     use SoftDeletes;
     protected $fillable = ['id','name','username','token','mobile','bank_card','status'];
     protected $table='seller';
     protected $dates = ['deleted_at'];
    }
