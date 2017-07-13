<?php

namespace App\Http\Controllers;

use Request;
use APP\Http\Requests;
use App\persons;//name model
use App\rolls;
use App\restful;
use Illuminate\Support\Facades\Validator;

class reseller extends Controller
{
  
     public function store(Request $request)
    {
         $validator=validator::make(
         Request::input(),
            [
           
            'name' => 'alpha',
            'username' =>'alpha',
            'mobile'=>'required|numeric|max:10000000000',
            'bank_card'=>'numeric|max:100000000000',
            'telegram_id'=>'required|alpha',
            'password'=>'required|alpha',
            'profile'=>'json'
            
           
            
            ]
        );
        if($validator->fails()){
            $error=$validator->errors();
            return response(" $error",400);
            //show errors if validation dosnt tru

        }
        $data=Request::all();
        $newitem=persons::create($data);
       //store and validate new item 
       $type=new rolls;
       $type->type='reseller';
       $type->details='{"a":"nothing"}';
       $newitem->rolls()->save($type);
        return $newitem;
        //ralationship with rolls tabel and save rolls item
    }
 

}