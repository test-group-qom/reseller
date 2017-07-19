<?php

namespace App\Http\Controllers;

use Request;
use APP\Http\Requests;
use App\persons;//name model
use App\restful;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class auth extends Controller
{
   public function store(Request $request)
   {
       return("its ok"); 
   }
}
