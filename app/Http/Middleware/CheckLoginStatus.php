<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginStatus
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
        $status = session('login_status');
        if (empty($status) || $status === 'F') {
            return redirect()->route('admin.auth.login');
        }

        return $next($request);
    }
}
