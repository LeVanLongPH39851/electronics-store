<?php

namespace App\Http\Controllers\Clients;

use App\Models\Order;
use App\Models\OrderHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderDetailController extends Controller
{
    //
    public function show(string $id){
        $order=Order::findOrFail($id);
        if ($order) {
            $template = "clients.accounts.orderdetail";
            return view("clients.layout", ["title" => "Chi tiết sản phẩm", "template" => $template, 'order' => $order]);
        }
    }
    
}
