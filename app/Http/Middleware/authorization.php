<?php

namespace App\Http\Middleware;
use App\persons;
use App\rolls;
use Closure;

class authorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       $token=request()->header('token');
        $check= persons::where('token', $token)->first(); 
        $id=$check["id"];
        if(!empty($check))
        {
        $roll=rolls::where('person_id', $id)->first();
    
            if( $roll["type"]=='admin')
            {
            
                return $next($request);
            }  
           
        return(response(['roll'=>'you are not admin'],403));
        }
        return (response(['token'=>'token dose not exist'],401));
    }
}
