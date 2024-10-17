<?php

namespace App\Http\Controllers\Admins;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    protected $classActive = "Đơn Hàng";

    public function index(Request $request)
    {
        // Lấy giá trị ô input
        $time_value = $request->input('time_value');
        $time_unit = $request->input('time_unit');
        
        $now = Carbon::now();
    
        if ($time_value && $time_unit) {
            switch ($time_unit) {
                case 's':
                    $duration = Carbon::now()->addSeconds($time_value);
                    break;
                case 'm':
                    $duration = Carbon::now()->addMinutes($time_value);
                    break;
                case 'h':
                    $duration = Carbon::now()->addHours($time_value);
                    break;
                case 'd':
                    $duration = Carbon::now()->addDays($time_value);
                    break;
                default:
                    $duration = $now;
                    break;
            }

            $orders = Order::whereNotNull('delivered_at')
                ->where('status', 'ghtc')
                ->get();
                
            foreach ($orders as $order) {
                $delivered_at = Carbon::parse($order->delivered_at);
                $waiting_time = $delivered_at->copy()->addSeconds($duration->diffInSeconds($now));
    
                $order->waiting_time = $waiting_time->toDateTimeString();
                $order->save();
            }
    
            Order::where('status', 'ghtc')
                ->where('waiting_time', '<=', $now)
                ->update(['status' => 'dndh']);
        }
    
        $orders = Order::orderBy('created_at')->get();
        
        $template = 'admins.orders.list';
    
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

    public function update(Request $request, string $id){
        if($request->isMethod('POST')){
        $request->validate([
         "status" => "required",
         "note" => "required|max:255"
        ],
        [
         "status" => "Vui lòng chọn trạng thái",
         "note" => "Vui lòng nhập ghi chú",
         "note.max" => "Ghi chú quá dài"
        ]
        );    
        $order = Order::find($id);
        if($order){
            $oldStatus = $order->status;
            $order->status = $request->input('status');
            $request->input('status') == "ghtc" ? $order->payment_status = "dtt" : "";
            if ($order->status === 'ghtc') {
                $order->delivered_at = now();
                $order->waiting_time = now()->addDays(4);
            }
            $order->save();
            OrderHistory::create([
                "from_status" => $oldStatus,
                "to_status" => $order->status,
                "note" => $request->input("note"),
                "by_user" => Auth::id(),
                "order_id" => $order->id,
            ]);
        return redirect()->back()->with("success", "Cập nhật trạng thái thành công");
        }
        return redirect()->back()->with("error", "Không tìm thấy đơn hàng");
        }
        return redirect()->back()->with("error", "Cập nhật đơn hàng không thành công");
    }
}