<?php

namespace App\Http\Controllers;

use Request;
use APP\Http\Requests;
use App\persons;//name model
use App\product;
use App\productprice;
use App\restful;
use Auth;
use Illuminate\Support\Facades\Validator;

class priceCtr extends Controller
{
    
     public function index(Request $request)
    {
         $allitem=productPrice::get();
         return $allitem;
        //show all item and methode is get 
    }
        public function store(Request $request)
    {
       
         $validator=validator::make(
         Request::input(),
            [
           
            'role' => 'alpha',
            'price' =>'numeric',
            'product_id'=>'numeric',
        
            ]
        );
        if($validator->fails()){
            $error=$validator->errors();
            return response(" $error",400);
            //show errors if validation dosnt tru

        }
        $data=Request::all();
        $newitem=productPrice::create($data);
       //store and validate new item 
       
        return $newitem;
        
    }
       public function show(Request $request,$id)
    {
    
        $findID= productPrice::where('product_id', $id)->get(); 
        $item= array($findID);
        return $findID->last();
        //show items id 
         
    }   
         public function showall(Request $request,$id)
    {
    
        $findID= productPrice::where('product_id', $id)->get(); 
        return $findID;
        //show items id 
         
    }  
    
     
}
