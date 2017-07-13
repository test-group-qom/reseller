<?php

namespace App\Http\Controllers;

use Request;
use APP\Http\Requests;
use App\persons;//name model
use App\restful;
use Illuminate\Support\Facades\Validator;

class forgetToken extends Controller
{

         public function store(Request $request)
    {
           $user= Request::input('mobile');
           $finduser= persons::where('mobile', $user)->first(); 
           if (!empty($finduser))
             {
                $finduser['remember_token']=str_random(50);
                $finduser->update();
                return (['remember_token'=>$finduser['remember_token']]);
             }
           return (response(['mobile'=>'your mobile dose not exist'],400));   
}
}