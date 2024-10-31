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
        // Kiểm tra người dùng đã đăng nhập
        $user = Auth::user();

        if (!$user) {
            // Nếu chưa đăng nhập, chỉ hiển thị thông báo yêu cầu đăng nhập
            return redirect()->route('client.login')->with('success', 'Vui lòng đăng nhập để xem sản phẩm đã xem gần đây.');
        }

        // Truy vấn danh sách sản phẩm đã xem gần đây từ cơ sở dữ liệu, sắp xếp theo thời gian
        $query = RecentlyViewedProduct::where('user_id', $user->id)
            ->with('product')
            ->orderByDesc('viewed_at');

        // Áp dụng tìm kiếm theo tên sản phẩm nếu có
        if ($request->input('search')) {
            $query->whereHas('product', function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->input('search') . '%');
            });
        }

        // Sử dụng paginate để phân trang (giới hạn 10 sản phẩm mỗi trang)
        $products = $query->paginate(10);

        // Trả về view chứa danh sách sản phẩm đã xem gần đây
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
            // Nếu người dùng đã đăng nhập, lưu sản phẩm đã xem vào cơ sở dữ liệu
            RecentlyViewedProduct::updateOrCreate(
                ['user_id' => $user->id, 'product_id' => $productId],
                ['viewed_at' => now()]
            );
        }

        // Chuyển hướng đến trang chi tiết sản phẩm dù có lưu hay không
        return redirect()->route('client.product.detail', $productId);
    }

    public function deleteRecentlyViewed($productId)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('client.login')->with('success', 'Vui lòng đăng nhập.');
        }

        // Tìm sản phẩm đã xem trong danh sách của người dùng
        $recentlyViewedProduct = RecentlyViewedProduct::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        // Nếu sản phẩm tồn tại trong danh sách đã xem, xóa nó
        if ($recentlyViewedProduct) {
            $recentlyViewedProduct->delete();
            return redirect()->route('recently.viewed')->with('success', 'Sản phẩm đã được xóa khỏi danh sách xem gần đây!');
        }

        return redirect()->route('recently.viewed')->with('error', 'Không tìm thấy sản phẩm để xóa!');
    }
}
