<?php

namespace App\Http\Controllers;

use Request;
use APP\Http\Requests;
use App\persons;//name model
use App\restful;
use Illuminate\Support\Facades\Validator;

class saveNewPassword extends Controller
{

         public function store(Request $request)
    {
           $user= Request::input('remeber_token');
           $finduser= persons::where('remember_token', $user)->first(); 
           if (!empty($finduser))
             {
                $new_pass= Request::input('new_pass');
                $repet_pass= Request::input('repet_pass');
                if ($repet_pass==$new_pass)
                {
                  $finduser['password']=bcrypt($new_pass);  
                  $finduser->update();
                return (['message'=>'your update successfully']);
                }
             return (response(['password'=>'please enter your pass cerfully'],400));    
             }
           return (response(['remember_token'=>'your remeber token dose not exist'],400));   
}
}