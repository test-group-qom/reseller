<?php

namespace App\Http\Controllers;

use Request;
use APP\Http\Requests;
use App\persons;//name model
use App\product;
use App\restful;
use Auth;
use Illuminate\Support\Facades\Validator;

class productCtl extends Controller
{
    
     public function index(Request $request)
    {
         $allitem=product::get();
         return $allitem;
        //show all item and methode is get 
    }
        public function store(Request $request)
    {
       
         $validator=validator::make(
         Request::input(),
            [
           
            'name' => 'alpha',
            'details' =>'json',
            'description'=>'alpha',
        
            ]
        );
        if($validator->fails()){
            $error=$validator->errors();
            return response(" $error",400);
            //show errors if validation dosnt tru

        }
        $data=Request::all();
        $newitem=product::create($data);
       //store and validate new item 
       
        return $newitem;
        
    }
       public function show(Request $request,$id)
    {
        $findID= product::where('id', $id)->first(); 
        return $findID;
        //show items id 
         
    }   
    
     public function destroy(Request $request,$id)
    {
       
        $findID =product::find($id);
        if (empty($findID))
        {
            return response("id not found",400);
        }
        $findID->delete();
            return ("the item is deleted");
        //delete a item by id and errors
    }
   
    public function update(Request $request,$id)
    {

    $item =product::where('id', $id)->first();
    $a=Request::all();
    $item->name              = $a['name'];
    $item->details          = $a['details'];
    $item->description         = $a['description'];
    
    
     $validator=validator::make(
          Request::input(),
            [
           
            'name' => 'alpha',
            'details' =>'json',
            'description'=>'alpha',
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
