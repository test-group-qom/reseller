<?php

namespace App\Http\Controllers;

use Request;
use APP\Http\Requests;
use App\seller;
use App\restful;
use Illuminate\Support\Facades\Validator;

class reseller extends Controller
{
  
     public function index(Request $request)
    {
         $allitem=seller::get();
         return $allitem;
        //show all item and methode is get 
    }
        public function store(Request $request)
    {
         $validator=validator::make(
         Request::input(),
            [
           
            'name' => 'required|alpha',
            'username' => 'required|alpha',
            'token'=> 'required|alpha',
            'mobile'=>'required|numeric|max:100',
            'bank_card'=>'required|numeric|max:100',
            
            ]
        );
        if($validator->fails()){
            $error=$validator->errors();
            return response(" $error",400);
            //show errors if validation dosnt tru

        }
        $data=Request::all();
        $data['status']=0;
        $newitem=seller::create($data);
        return $newitem;
       //store and validate new item 

    }
       public function show(Request $request,$id)
    {
       
        $findID= seller::where('id', $id)->first(); 
        return $findID;
        //show items id 
         
    }   
    
     public function destroy(Request $request,$id)
    {
       
        $findID = seller::find($id);
        if (empty($findID))
        {
            return response("id not found",400);
        }
        $findID->delete();
        //delete a item by id and errors
    }
   
    public function update(Request $request,$id)
    {

    $item = seller::where('id', $id)->first();
    $a=Request::all();
    $item->name              = $a['name'];
    $item->username          = $a['username'];
    $item->bank_card         = $a['bank_card'];
    $item->token             = $a['token'];
    $item->mobile            = $a['mobile'];
    
     $validator=validator::make(
          Request::input(),
            [
           
            'name' => 'required|alpha',
            'username' => 'required|alpha',
            'token'=> 'required|alpha',
            'mobile'=>'required|numeric|max:1000000000000000',
            'bank_card'=>'required|numeric|max:100000000000000',
            
            ]
            //update and validate 
        );
        if($validator->fails()){
            $error=$validator->errors();
           return response(" $error",400);
        }
    $item->save();
    return $item;
   }

}