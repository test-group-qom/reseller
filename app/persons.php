<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class persons extends Model
{
     use SoftDeletes;
     protected $fillable = ['id','name','username','token','mobile','bank_card','telegram_id','password','remember_token','profile','status'];
     protected $table='persons';
     protected $dates = ['deleted_at'];


   public function rolls()
    {
        return $this->hasMany('App\rolls' ,'person_id');
    }
}
