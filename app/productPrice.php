<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class productPrice extends Model
{
    use SoftDeletes;
    protected $fillable = ['id','product_id','role','price'];
     protected $table='productPrice';
     protected $dates = ['deleted_at'];

  public function product()
    {
        return $this->belongsTo('App\product');
    }
 
     
}
