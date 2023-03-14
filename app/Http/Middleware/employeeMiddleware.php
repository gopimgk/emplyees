<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class employeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next){
     if(Auth::user()){
         if(Auth::user()->role=='admin'){
           return $next($request);
          }
         elseif(Auth::user()->role=='user'){
           if($request->routeIs('userdashboard')){
           return $next($request);
            }
            else{
            return redirect('loginNew')->with('message','please login admin credentials');
             }
        }
      }
     elseif(Auth::guard('weber')->user()){
        return $next($request);
        }
      return redirect('loginNew')->with('message','please login ');
    
    }
}
