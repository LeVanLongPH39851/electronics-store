<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() == false || (Auth::user()->role != 1 && Auth::user()->role != 2)) { //Kiểm tra nếu chưa đăng nhập hoặc vai trò không phải admin và nhân viên
            //Chuyển hướng đến trang đăng nhập với thông báo lỗi
            return redirect()->route('admin.login')->with('error', 'Vui lòng đăng nhập');
        }
        
        return $next($request); //Chạy tiếp
    }
}