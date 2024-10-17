<?php

namespace App\Http\Controllers\Clients;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $carts = Cart::where('user_id', auth()->id())->get();
        if($carts->isEmpty()){
            return redirect()->route('client.cart')->with('error', 'Giỏ hàng của bạn hiện đang trống.');
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|numeric',   
            'paymentMethod' => 'required|string|in:cod,online',
        ], [
            'name.required' => 'Họ và tên không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.numeric' => 'Số điện thoại phải là số',
            'paymentMethod.required' => 'Bạn chưa chọn phương thức thanh toán.',
            'paymentMethod.in' => 'Phương thức thanh toán không hợp lệ.'
        ]);
        
        $totalPrice = 0;
        foreach($carts as $cart){
            $productVariant = ProductVariant::find($cart->productVariant->id);
            if($productVariant->quantity < $cart->variant_quantity){
                return redirect()->back()->with('error', 'Số lượng sản phầm đã quá tồn kho');
            }
            $totalPrice += $cart->productVariant->price * $cart->variant_quantity;
        }
        $orderInfo = [
            'paymentMethod' => $request->paymentMethod,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'total_price' => $totalPrice,
            'note' => $request->note
        ];
        session(['order_info' => $orderInfo]);
        
        if($request->paymentMethod === "cod"){
        $order = Order::create([
            'order_code' => "OR-".Str::random(5),
            'status' => "cxn",
            'payment_method' => "cod",
            'payment_status' => "ctt",
            'total_price' => $totalPrice,
            'user_name' => $request->name,
            'user_phone' => $request->phone,
            'user_address' => $request->address,
            'note' => $request->note,
            'user_id' => Auth::id()
        ]);

        foreach($carts as $cart){
            $imagePath = 'uploads/orders/order_'.$order->id."/".basename($cart->productVariant->image);
            Storage::disk('public')->copy($cart->productVariant->image, $imagePath);
            OrderDetail::create([
              "product_name" => $cart->productVariant->product->name,
              "product_variant_image" => $cart->productVariant->image,
              "color_name" => $cart->productVariant->color->name,
              "ssd_name" => $cart->productVariant->ssd->name,
              "import_price" => $cart->productVariant->import_price,
              "listed_price" => $cart->productVariant->listed_price,
              "price" => $cart->productVariant->price,
              "quantity" => $cart->variant_quantity,
              "product_id" => $cart->productVariant->product->id,
              "order_id" => $order->id
            ]);
            $cart->productVariant->quantity -= $cart->variant_quantity;
            $cart->productVariant->save();
        }
        Cart::where('user_id', auth()->id())->delete();
        return redirect()->route('client.accounts.thanhcong')->with('success', 'Đơn hàng của bạn đã được ghi nhận. Thanh toán khi nhận hàng!');
        }

        return $this->redirectToVnPay();
    }
    
    private function redirectToVnPay()
    {
        // Lấy giỏ hàng của người dùng hiện tại
        $carts = Cart::where('user_id', auth()->id())->get();

        // Khởi tạo tổng số tiền thanh toán
        $totalAmount = $carts->sum(function ($cart) {
            return $cart->productVariant->price * $cart->variant_quantity;
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

            $order = Order::create([
                'order_code' => "OR-".Str::random(5),
                'status' => "cxn",
                'payment_method' => "online",
                'payment_status' => "dtt",
                'total_price' => $orderInfo['total_price'],
                'user_name' => $orderInfo['name'],
                'user_phone' => $orderInfo['phone'],
                'user_address' => $orderInfo['address'],
                'note' => $orderInfo['note'],
                'user_id' => Auth::id()
            ]);

            $carts = Cart::where('user_id', auth()->id())->get();
            
            foreach($carts as $cart){
                $imagePath = 'uploads/orders/order_'.$order->id."/".basename($cart->productVariant->image);
                Storage::disk('public')->copy($cart->productVariant->image, $imagePath);
                OrderDetail::create([
                  "product_name" => $cart->productVariant->product->name,
                  "product_variant_image" => $cart->productVariant->image,
                  "color_name" => $cart->productVariant->color->name,
                  "ssd_name" => $cart->productVariant->ssd->name,
                  "import_price" => $cart->productVariant->import_price,
                  "listed_price" => $cart->productVariant->listed_price,
                  "price" => $cart->productVariant->price,
                  "quantity" => $cart->variant_quantity,
                  "product_id" => $cart->productVariant->product->id,
                  "order_id" => $order->id
                ]);
                $cart->productVariant->quantity -= $cart->variant_quantity;
                $cart->productVariant->save();
            }

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