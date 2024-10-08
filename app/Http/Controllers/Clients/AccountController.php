<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function account()
    {
        $template = "clients.accounts.account";
        return view("clients.layout", ["title" => "Account", "template" => $template]);
    }

    public function orderDetail()
    {
        $template = "clients.accounts.orderdetail";
        return view("clients.layout", ["title" => "Lịch sử đơn hàng", "template" => $template]);
    }
    public function thanhCong()
    {
        $template = "clients.accounts.thanhcong";
        return view("clients.layout", ["title" => "Thanh toán thành công", "template" => $template]);
    }
    public function orderHistory()
    {
        $template = "clients.accounts.orderhistory";
        $user = auth()->user();
        $orders = Order::where('user_id', $user->id)->get();
        //cái này làm chi tiết đơn hàng, thêm trươc get() ->with('orderDetails.variant.product', 'orderDetails.variant.color', 'orderDetails.variant.ssd') (chat gpt ra cái này)
        return view("clients.layout", ["title" => "Đơn hàng đã mua", "template" => $template], compact('orders'));
    }
}
