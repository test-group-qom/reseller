<?php

namespace App\Http\Controllers;

use Request;
use APP\Http\Requests;
use App\persons;//name model
use App\rolls;
use App\restful;
use Auth;
use Illuminate\Support\Facades\Validator;

class costumer extends Controller
{
  
     public function index(Request $request)
    {
         $allitem=persons::get();
         return $allitem;
        //show all item and methode is get 
    }
        public function store(Request $request)
    {
        // dd(Request::input());
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
        $data['password']=bcrypt($data['password']);
        $newitem=persons::create($data);
       //store and validate new item 
       $type=new rolls;
       $type->type='costomer';
       $type->details='{"a":"nothing"}';
       $newitem->rolls()->save($type);
        return $newitem;
        //ralationship with rolls tabel and save rolls item
    }
       public function show(Request $request,$id)
    {
       

        $findID= persons::where('id', $id)->first(); 
        return $findID;
        //show items id 
         
    }   
    
     public function destroy(Request $request,$id)
    {
       
        $findID = persons::find($id);
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

    $item = persons::where('id', $id)->first();
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
            'telegram_id'=>'required|alpha',
            'password'=>'required|alpha',
            'remember_token'=>'required|alpha',
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