<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        $is_active = Auth::user(['active']);
        $user = $request->user();
        if($is_active=='' && !empty($user)){            
            Auth::logout();
            return redirect('/login');
        }else{
            return $next($request);
        }
        // Auth::logout();
        // return redirect('/login');

        
    }

}
