<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function account()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        $template = "clients.accounts.account";
        return view("clients.layout", ["title" => "Account", "template" => $template, "orders" => $orders]);
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
}