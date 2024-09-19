<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoggedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() == true && Auth::user()->role_id == 1){ //Nếu đăng nhập admin rồi
            //Chuyển đến trang giao diện admin luôn
            return redirect()->route("admin.index");
        }

        return $next($request); //Chạy tiếp
    }
}