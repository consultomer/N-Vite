<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (\Auth::guard('admin')->check()) {
            $admin = \Auth::guard('admin')->user();
            $name = $admin->name;
            // dd($name);
            return $next($request, $name);
        }

        return redirect()->route('admin');
    }
}
