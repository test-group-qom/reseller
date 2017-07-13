<?php

namespace App\Http\Controllers;

use Request;
use APP\Http\Requests;
use App\persons;//name model
use App\restful;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class login extends Controller
{
        public function store(Request $request)
    {
           $user= Request::input('username');
           $pass=Request::input('password');
           $finduser= persons::where('username', $user)->first(); 
    
        if (Hash::check($pass, $finduser['password']))
        {
           if ($finduser['token']==null){
               $finduser['token']=str_random(50);
               $finduser->update();
               $json=(['Token'=>$finduser['token']]);
                return $json;
               
           }
            $json=(['token'=>$finduser['token']]);
            return $json;
        }
          return (response(['username'=>'username or password dose not exist'],400));
    }

}