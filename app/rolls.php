<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class rolls extends Model
{
     use SoftDeletes;
     protected $fillable = ['id','type','person_id','details'];
     protected $table='rolls';
     protected $dates = ['deleted_at'];

 public function persons()
    {
        return $this->belongsTo('App\persons');
    }
 
}