<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\RecentlyViewedProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecentlyViewedController extends Controller
{
    public function recentlyViewed(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('client.login')->with('success', 'Vui lòng đăng nhập để xem sản phẩm đã xem gần đây.');
        }

        $query = RecentlyViewedProduct::where('user_id', $user->id)
            ->with('product')
            ->orderByDesc('viewed_at');

        if ($request->input('search')) {
            $query->whereHas('product', function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->input('search') . '%');
            });
        }

        $products = $query->paginate(10);

        $template = 'clients.views.recentlyViewed';
        return view('clients.layout', [
            'title' => 'Sản phẩm đã xem gần đây',
            'template' => $template,
            'products' => $products,
        ]);
    }

    public function addRecentlyViewed($productId)
    {
        $user = Auth::user();

        if ($user) {
            RecentlyViewedProduct::updateOrCreate(
                ['user_id' => $user->id, 'product_id' => $productId],
                ['viewed_at' => now()]
            );
        }

        return redirect()->route('client.product.detail', $productId);
    }

    public function deleteRecentlyViewed($productId)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('client.login')->with('success', 'Vui lòng đăng nhập.');
        }

        $recentlyViewedProduct = RecentlyViewedProduct::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        if ($recentlyViewedProduct) {
            $recentlyViewedProduct->delete();
            return redirect()->route('recently.viewed')->with('success', 'Sản phẩm đã được xóa khỏi danh sách xem gần đây!');
        }

        return redirect()->route('recently.viewed')->with('error', 'Không tìm thấy sản phẩm để xóa!');
    }
}
