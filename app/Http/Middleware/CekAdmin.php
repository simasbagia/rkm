<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth as Auth;
class CekAdmin
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
        $admin = Auth::guard('admin')->user();
        if($admin){
            return $next($request);
        }
        else  return redirect()->route('admin.login');
    }
}
