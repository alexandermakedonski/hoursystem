<?php

namespace App\Http\Middleware;

use Closure;

class LockScreen
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
        if(\Auth::check() || \Session::has('lockscreen')){
            return $next($request);
        }else{
            return redirect('/account/login');
        }

    }
}
