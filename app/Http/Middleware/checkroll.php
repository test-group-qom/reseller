<?php


namespace App\Http\Middleware;
use App\persons;
use App\rolls;
use Closure;

class checkroll
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,...$rols)
    {
        $correct=0;
        $token=request()->header('token');
        $check= persons::where('token', $token)->first();
        if(!empty($check["token"]))
        {
             $roll=$check->rolls;
        for ($j=0;$j<count($roll);$j++)
      {
            $type[$j]=$roll[$j]->type;
        
        for ($i=0;$i<count($rols);$i++)
        {
                if($type[$j]==$rols[$i])
                {
                
                    $request->persons=$check;               
                    return $next($request);
                }
        }    
      }
              
        return(response(['roll'=>'you are not admin or reseller'],403));
        }
        
        return (response(['token'=>'token dose not exist or null'],401));
    }
    }

