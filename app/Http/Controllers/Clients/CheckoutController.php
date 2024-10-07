<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
    {
    public function checkout() {
        $carts = Cart::where('user_id', auth()->id())->get();

        // Kiểm tra nếu giỏ hàng rỗng
        if ($carts->isEmpty()) {
            return redirect()->route('client.cart')->with('error', 'Giỏ hàng của bạn hiện đang trống.');
        }

        $template = "clients.checkouts.checkout";
        return view("clients.layout", ["title" => "Checkout", "template" => $template, "carts" => $carts]);
    }

    public function process(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'paymentMethod' => 'required|string|in:cod,online',
        ], [
            'name.required' => 'Họ và tên không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
            'email.required' => 'Không được để trống email',
            'email.email' => 'Email không đúng định dạng',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.numeric' => 'Số điện thoại phải là số',
            'paymentMethod.required' => 'Bạn chưa chọn phương thức thanh toán.'
        ]);
        
        $order = new Order();
        $order->order_code = time();
        $order->status = 'cxn';
        $order->payment_method = $request->paymentMethod;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->user_id = auth()->id(); 
        $order->save();
    
        Cart::where('user_id', auth()->id())->delete();
    
        if ($request->paymentMethod == 'cod') {
            return redirect()->route('client.accounts.thanhcong')
                ->with('success', 'Đơn hàng của bạn đã được ghi nhận. Thanh toán khi nhận hàng!');
        }
    
        return redirect()->back()->with('error', 'Phương thức thanh toán không hợp lệ!');
    }    
}