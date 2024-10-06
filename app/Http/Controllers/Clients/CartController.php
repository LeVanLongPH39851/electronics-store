<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;



class CartController extends Controller
{
    // Hàm để thêm sản phẩm vào giỏ hàng
    public function addToCart(Request $request)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!Auth::check()) {
            return redirect()->route('client.login')->with('error', 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng!');
        }

        // Xác thực dữ liệu đầu vào
        $validatedData = $request->validate([
            'variant_id' => 'required|exists:product_variants,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Tìm sản phẩm biến thể
        $variant = ProductVariant::find($validatedData['variant_id']);

        // Kiểm tra xem sản phẩm có còn trong kho không
        if ($variant->quantity < $validatedData['quantity']) {
            return redirect()->back()->with('error', 'Số lượng sản phẩm yêu cầu vượt quá số lượng có sẵn!');
        }

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('variant_id', $validatedData['variant_id'])
            ->first();

        if ($cartItem) {
            // Nếu sản phẩm đã tồn tại, cập nhật số lượng
            $cartItem->variant_quantity += $validatedData['quantity'];

            // Kiểm tra lại số lượng trong kho
            if ($variant->quantity < $cartItem->variant_quantity) {
                return redirect()->back()->with('error', 'Số lượng sản phẩm yêu cầu vượt quá số lượng có sẵn!');
            }

            $cartItem->save();
        } else {
            // Nếu sản phẩm chưa tồn tại, tạo mới
            Cart::create([
                'user_id' => Auth::id(),
                'variant_id' => $validatedData['variant_id'],
                'variant_quantity' => $validatedData['quantity'],
            ]);
        }

        return redirect()->route('client.cart')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }


    public function showCart()
    {
        $carts = Cart::with(['variant.ssd', 'variant.color'])
            ->where('user_id', Auth::id())
            ->get();
        $template = "clients.carts.cart";
        return view("clients.layout", ["title" => "Checkout", "template" => $template, "carts" => $carts]);
    }

    public function updateCart(Request $request)
    {
        foreach ($request->quantities as $cartId => $quantity) {
            $cart = Cart::find($cartId);
            if ($cart) {
                // Kiểm tra xem biến thể có còn trong kho không
                $variant = ProductVariant::find($cart->variant_id);
                if ($variant->quantity < $quantity) {
                    return redirect()->back()->with('error', 'Số lượng sản phẩm yêu cầu vượt quá số lượng có sẵn!');
                }

                $cart->variant_quantity = $quantity;
                $cart->save();
            }
        }

        return redirect()->route('client.cart')->with('success', 'Giỏ hàng đã được cập nhật!');
    }


    public function removeFromCart(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'cart_id' => 'required|exists:carts,id',
        ]);

        // Tìm giỏ hàng theo ID
        $cartItem = Cart::find($request->cart_id);

        // Nếu sản phẩm tồn tại trong giỏ hàng, xóa nó
        if ($cartItem) {
            $cartItem->delete();
            return redirect()->route('client.cart')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng!');
        }

        return redirect()->route('client.cart')->with('error', 'Không tìm thấy sản phẩm để xóa!');
    }
}
