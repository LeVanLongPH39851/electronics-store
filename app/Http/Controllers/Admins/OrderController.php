<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $classActive = "Đơn Hàng";

    public function index(){
        $orders = Order::orderBy('created_at')->get();
        $template = 'admins.orders.list'; //Tạo biến template để include vào content của layout

        return view('admins.layout', [
         'title' => 'Danh Sách Đơn Hàng',
         'template' => $template,
         'classActive' => $this->classActive,
         'orders' => $orders
        ]);
    }

    public function show(string $id){
        $order = Order::find($id);
        if($order){
        $template = 'admins.orders.detail'; //Tạo biến template để include vào content của layout

        return view('admins.layout', [
         'title' => 'Chi Tiết Đơn Hàng',
         'template' => $template,
         'classActive' => $this->classActive,
         'order' => $order
        ]);
        }
        return redirect()->back()->with("error", "Không tìm thấy đơn hàng");
    }
}