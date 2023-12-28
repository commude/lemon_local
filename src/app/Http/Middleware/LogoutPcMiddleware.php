<?php

namespace App\Http\Middleware;

use App\Services\UserAgent;
use Closure;
use Illuminate\Support\Facades\Auth;

class LogoutPcMiddleware
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
        if (!config('app.pc_view')) {
            if(UserAgent::isMobileOrPc($request) == 'pc' && Auth::check()) {
                Auth::logout();
                return redirect()->route('top');
            }
        }

        return $next($request);
    }
}
