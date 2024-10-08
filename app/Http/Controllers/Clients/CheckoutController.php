<?php

namespace App\Http\Controllers\Clients;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

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
            'email.required' => 'Không được để trống email',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.numeric' => 'Số điện thoại phải là số',
            'paymentMethod.required' => 'Bạn chưa chọn phương thức thanh toán.'
        ]);

        $totalPrice = 0;
        foreach($carts as $cart){
            $totalPrice += $cart->productVariant->price * $cart->variant_quantity;
        }
        
        $order = Order::create([
            'order_code' => "OR-".Str::random(5),
            'status' => "cxn",
            'payment_mothod' => "cod",
            'payment_status' => "ctt",
            'total_price' => $totalPrice,
            'user_name' => $request->name,
            'user_phone' => $request->phone,
            'user_address' => $request->address,
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
    
        if ($request->paymentMethod == 'cod') {
            return redirect()->route('client.accounts.thanhcong')
                ->with('success', 'Đơn hàng của bạn đã được ghi nhận. Thanh toán khi nhận hàng!');
        }
    
        return redirect()->back()->with('error', 'Phương thức thanh toán không hợp lệ!');
    }    
}