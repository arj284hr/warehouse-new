<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckUserRole
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
        if(Auth::check())
        {
            $prefix = $request->route()->getPrefix();
            if($prefix == '/admin')
            {
                if(Auth::user()->isManager())
                {
                    return redirect()->route('manager.dashboard');

                }
                else if(Auth::user()->isEmployee())
                {
                    return redirect()->route('employee.dashboard');
                }

            }
            else if($prefix == '/manager')
            {
                if(Auth::user()->isAdmin())
                {
                    return redirect()->route('admin.dashboard');
                }
                else if(Auth::user()->isEmployee())
                {
                    return redirect()->route('employee.dashboard');
                }                
            }
            else if($prefix == '/employee')
            {
                 if(Auth::user()->isAdmin())
                {
                    return redirect()->route('admin.dashboard');
                }
                 else if(Auth::user()->isManager())
                {
                    return redirect()->route('manager.dashboard');

                }
            }
        }

        return $next($request);
    }
}
