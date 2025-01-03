<?php

namespace App\Http\Controllers\Admins;

use App\Models\Order;
use App\Models\OrderHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    protected $classActive = "Đơn Hàng";

    public function index(Request $request)
    {
        $query = Order::query();

        // Lọc theo trạng thái
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Tìm kiếm theo từ khóa
        if ($request->has('keyWord') && $request->keyWord != '') {
            $keyWord = $request->keyWord;
            $query->where(function ($q) use ($keyWord) {
                $q->where('order_code', 'LIKE', '%' . $keyWord . '%')
                    ->orWhere('user_name', 'LIKE', '%' . $keyWord . '%')
                    ->orWhere('user_phone', 'LIKE', '%' . $keyWord . '%');
            });
        }

        // Sắp xếp theo ngày tạo
        $orderBy = $request->get('orderBy', 'latest') == 'latest' ? 'desc' : 'asc';
        $query->orderBy('created_at', $orderBy);

        // Phân trang
        $perPage = $request->get('perPage', 15);
        $orders = $query->paginate($perPage);
        return view('admins.layout', [
            'title' => 'Danh Sách Đơn Hàng',
            'template' => 'admins.orders.list',
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
            $order->save();
            OrderHistory::create([
                "from_status" => $oldStatus,
                "to_status" => $order->status,
                "note" => $request->input("note"),
                "by_user" => Auth::id(),
                "order_id" => $order->id,
            ]);
            $user = User::find($order->user_id);
            $userEmail = $user->email;
            $userName = $user->name;
            $status = $order->status === "cxn" ? "Đang chờ xác nhận" : ($order->status === "dxn" ? "Đã xác nhận" : ($order->status === "dgh" ? "Đang giao hàng" : ($order->status === "ghtc" ? "Giao hành thành công" : ($order->status === "ghtb" ? "Giao hành thất bại" : ($order->status === "dh" ? "Đã hủy" : "Hoàn thành")))));
            Mail::send('admins.mails.mail', ['name' => $userName, 'status' => $status], function($email) use ($userEmail){
              $email->subject('Thông báo thay đổi trạng thái đơn hàng');
              $email->to($userEmail);
            });   
        return redirect()->back()->with("success", "Cập nhật trạng thái thành công");
        }
        return redirect()->back()->with("error", "Không tìm thấy đơn hàng");
        }
        return redirect()->back()->with("error", "Cập nhật đơn hàng không thành công");
    }
}
