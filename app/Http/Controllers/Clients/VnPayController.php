<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class VnPayController extends Controller
{
    public function checkout()
    {
        $carts = Cart::where('user_id', auth()->id())->get();

        // Kiểm tra nếu giỏ hàng rỗng
        if ($carts->isEmpty()) {
            return redirect()->route('client.cart')->with('error', 'Giỏ hàng của bạn hiện đang trống.');
        }

        $template = "clients.checkouts.checkout";
        return view("clients.layout", ["title" => "Checkout", "template" => $template, "carts" => $carts]);
    }

    public function vnpay_payment(Request $request)
    {
        // Xác thực dữ liệu
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
            'paymentMethod.required' => 'Bạn chưa chọn phương thức thanh toán.',
            'paymentMethod.in' => 'Phương thức thanh toán không hợp lệ.',
        ]);

        // Lưu thông tin đơn hàng vào session
        $orderInfo = [
            'paymentMethod' => $request->paymentMethod,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];
        session(['order_info' => $orderInfo]);

        // Nếu thanh toán COD
        if ($request->paymentMethod == 'cod') {
            // Tạo đơn hàng và lưu vào cơ sở dữ liệu
            $order = new Order();
            $order->order_code = time(); // Hoặc tạo mã đơn hàng theo cách khác
            $order->status = 'cxn'; // Trạng thái đơn hàng
            $order->payment_method = 'cod'; // Lưu phương thức thanh toán
            $order->name = $request->name;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->user_id = auth()->id();
            $order->save();

            // Xóa giỏ hàng của người dùng
            Cart::where('user_id', auth()->id())->delete();
            return redirect()->route('client.accounts.thanhcong')
                ->with('success', 'Đơn hàng của bạn đã được ghi nhận. Thanh toán khi nhận hàng!');
        }

        // Nếu thanh toán online, chuyển sang phương thức thanh toán VNPAY
        return $this->redirectToVnPay();
    }

    private function redirectToVnPay()
    {
        // Lấy thông tin đơn hàng từ session
        $orderInfo = session('order_info');

        // Lấy giỏ hàng của người dùng hiện tại
        $carts = Cart::where('user_id', auth()->id())->get();

        // Khởi tạo tổng số tiền thanh toán
        $totalAmount = $carts->sum(function ($cart) {
            return $cart->variant->price * $cart->variant_quantity;
        });

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('client.vnpay.callback');
        $vnp_TmnCode = "ACRW9YT2"; // Mã website tại VNPAY 
        $vnp_HashSecret = "EDPQ00ARF4DDOIK72AUZYZPJKE6AWDFC"; // Chuỗi bí mật

        $vnp_TxnRef = time(); // Sử dụng thời gian hiện tại làm mã đơn hàng
        $vnp_OrderInfo = 'Thanh toán đơn hàng';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $totalAmount * 100; // VNPAY yêu cầu số tiền tính bằng đồng
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        ];

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        // Tạo chuỗi dữ liệu để tạo mã bảo mật
        ksort($inputData);
        $query = "";
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url .= "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', ltrim($hashdata, '&'), $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        return redirect()->away($vnp_Url);
    }

    public function handleVnPayCallback(Request $request)
    {
        // Lấy thông tin từ VNPAY
        $vnp_ResponseCode = $request->input('vnp_ResponseCode');
        $vnp_TxnRef = $request->input('vnp_TxnRef'); // Mã đơn hàng
    
        // Kiểm tra phản hồi từ VNPAY
        if ($vnp_ResponseCode == '00') {
            // Thanh toán thành công
            $orderInfo = session('order_info'); // Lấy thông tin đơn hàng từ session
    
            // Tạo đơn hàng và lưu vào cơ sở dữ liệu
            $order = new Order();
            $order->order_code = $vnp_TxnRef; // Mã đơn hàng
            $order->status = 'cxn'; // Trạng thái đơn hàng
            $order->payment_method = $orderInfo['paymentMethod']; // Lưu phương thức thanh toán
            $order->name = $orderInfo['name'];
            $order->email = $orderInfo['email'];
            $order->phone = $orderInfo['phone'];
            $order->address = $orderInfo['address'];
            $order->user_id = auth()->id();
            $order->save();
    
            // Xóa giỏ hàng của người dùng
            Cart::where('user_id', auth()->id())->delete();
    
            // Xóa session order_info
            session()->forget('order_info');
    
            return redirect()->route('client.accounts.thanhcong')
                ->with('success', 'Thanh toán thành công! Đơn hàng của bạn đã được ghi nhận.');
        }
    
        // Nếu thanh toán không thành công
        return redirect()->route('client.checkouts.checkout')
            ->with('error', 'Có lỗi xảy ra khi thanh toán. Vui lòng thử lại.');
    }    
}
