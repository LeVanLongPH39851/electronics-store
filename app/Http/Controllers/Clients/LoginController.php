<?php

namespace App\Http\Controllers\Clients;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{   
    //Form đăng nhập client
    public function login(){
        $template = "clients.logins.login";
        return view("clients.layout", ["title" => "Login", "template" => $template]);
    }

    //Đăng nhập client
    public function store(Request $request){
        //Validate
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        //Kiểm tra xem email, password có đúng không
        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ])){
            //Đăng nhập thành công chuyển sang trang giao diện client và tạo biến success = 'Logged in successfully'
                return redirect()->route('client.index')->with('success', 'Logged in successfully');
        }

        //Đăng nhập không thành công, hiện lại form đăng nhập client và tạo session error = 'Email or password is incorrect'
        return redirect()->back()->with("error", "Email or password is incorrect");
    }

    //Form đăng nhập client
    public function signup(){
        $template = "clients.logins.signup";
        return view("clients.layout", ["title" => "Sign Up", "template" => $template]);
    }
    
    //Đăng nhập client
    public function storeSignup(Request $request){
        //Validate
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required_with:password|same:password'
        ]);

        //Tạo biến password
        $password = $request->input('password');

        //Tạo user
        User::create([
            "user_code" => "UR-".Str::random(5),
            "name" => $request->input('name'),
            "email" => $request->input('email'),
            'show_password' => $password,
            'password' => Hash::make($password),
            "role_id" => 3
        ]);

        //Đăng nhập thành công, hiện form đăng nhập client và tạo session success = 'Signuped successfully'
        return redirect()->route('client.login')->with("success","Signuped successfully");
    }
    
    //Đăng xuất client
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        //Đăng xuất và chuyển đến form đăng nhập client
        return redirect()->route("client.login")->with("success", "Logged out");
    }
}