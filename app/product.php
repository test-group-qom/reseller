<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class product extends Model
{ 
use SoftDeletes;
     protected $fillable = ['id','name','description','creator','details'];
     protected $table='product';
     protected $dates = ['deleted_at'];

     public function persons()
    {
        return $this->belongsTo('App\persons');
    }
 
}
