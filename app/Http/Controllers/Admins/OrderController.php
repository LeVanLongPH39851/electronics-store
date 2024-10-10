<?php

namespace App\Http\Controllers\Admins;

use App\Models\Order;
use App\Models\OrderHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    protected $classActive = "Đơn Hàng";

    public function index()
    {
        $orders = Order::orderBy('created_at')->get();
        $template = 'admins.orders.list'; //Tạo biến template để include vào content của layout

        return view('admins.layout', [
            'title' => 'Danh Sách Đơn Hàng',
            'template' => $template,
            'classActive' => $this->classActive,
            'orders' => $orders
        ]);
    }

    public function show(string $id)
    {
        $order = Order::find($id);
        if ($order) {
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

    public function update(Request $request, string $id)
    {
        if ($request->isMethod('POST')) {
            $request->validate([
                "status" => "required"
            ], [
                "status" => "Vui lòng chọn trạng thái"
            ]);

            $order = Order::find($id);

            if ($order) {
                $oldStatus = $order->status;
                $newStatus = $request->input('status');
                $order->status = $newStatus;
                $delivered_at = $request->input('delivered_at');
                if ($newStatus === 'ghtc') {
                    $order->delivered_at = now();
                }
                $order->save();
                OrderHistory::create([
                    "from_status" => $oldStatus,
                    "to_status" => $newStatus,
                    "note" => $request->input("note"),
                    "by_user" => Auth::id(),
                    "order_id" => $order->id
                ]);
                return redirect()->back()->with("success", "Cập nhật trạng thái thành công");
            }
            return redirect()->back()->with("error", "Không tìm thấy đơn hàng");
        }
        return redirect()->back()->with("error", "Cập nhật đơn hàng không thành công");
    }
}
