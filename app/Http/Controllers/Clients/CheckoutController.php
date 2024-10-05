<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(){
        $template = "clients.checkouts.checkout";
        return view("clients.layout", ["title" => "Checkout", "template" => $template]);
    }
    public function process(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'paymentMethod' => 'required|string',
        ], [
            'name.required' => 'Họ và tên không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
            'email.required' => 'Không được để trống email',
            'email.email' => 'Email không đúng định dạng',
            'phone.required' => 'Số điện thoại không được để trống',
            'paymentMethod.required' => 'Bạn chưa chọn phương thức thanh toán.'
        ]);

        return redirect()->back()->with('success', 'Thông tin thanh toán hợp lệ!');
    }
}