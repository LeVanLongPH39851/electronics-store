<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Form đăng nhập admin
    public function index(){ 
        return view('admins.logins.login', ['title' => 'Login']);
    }

    //Đăng nhập admin
    public function store(Request $request){
        //Validate
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        //Kiểm tra xem email, password có đúng không và role là admin
        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'role_id' => 1
        ])){
            //Đăng nhập thành công, chuyển sang trang giao diện admin và tạo session success = 'Logged in successfully'
                return redirect()->route('admin.index')->with('success', 'Logged in successfully');
        }
        
        //Đăng nhập không thành công, hiện lại form đăng nhập admin và tạo session error = 'Email or password is incorrect'
        return redirect()->back()->with("error", "Email or password is incorrect");
    }
    
    //Đăng xuất admin
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        //Đăng xuất và chuyển đến form đăng nhập admin
        return redirect()->route("admin.login")->with("success", "Logged out");
    }
}