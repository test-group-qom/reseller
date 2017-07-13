<?php

namespace App\Http\Controllers;

use Request;
use APP\Http\Requests;
use App\persons;//name model
use App\restful;
use Illuminate\Support\Facades\Validator;

class logout extends Controller
{

         public function store(Request $request)
    {
           $user= Request::input('token');
           $finduser= persons::where('token', $user)->first(); 
           if (!empty($finduser))
             {
                $finduser['token']=null;
                $finduser->update();
                return (['massage'=>'you are loging out']);
             }
           return (response(['token'=>'your token dose not exist'],400));   
}
