<?php

namespace App\Http\Controllers\Clients;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductDetailController extends Controller
{
    public function productDetail(Request $request, string $id)
    {
        // Lấy thông tin sản phẩm
        $product = Product::with('category')
            ->withMin('productVariants', 'price')
            ->withMax('productVariants', 'price')
            ->withSum('productVariants', 'quantity')
            ->withCount('reviews')
            ->withAvg('reviews', 'star')
            ->find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Không tìm thấy sản phẩm');
        }

        // Tăng lượt xem
        $product->increment('view');
        $viewsCount = $product->views;

        // Lấy sản phẩm liên quan
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $id)
            ->take(4)
            ->get();

        // Tính điểm đánh giá trung bình
        $averageRating = $product->reviews_avg_star ?? 0;

        // Lọc đánh giá
        $query = $product->reviews()->with('user');

        // Lọc theo sao (nếu có trong request)
        if ($request->filled('star')) {
            $query->where('star', $request->star);
        }

        // Sắp xếp theo mới nhất/cũ nhất
        if ($request->get('sort') == 'oldest') {
            $query->orderBy('created_at', 'asc');
        } else {
            $query->orderBy('created_at', 'desc'); // Mặc định là sắp xếp theo mới nhất
        }

        // Lấy danh sách đánh giá sau khi lọc và phân trang
        $reviews = $query->paginate(5);

        // Chọn template để hiển thị
        $template = "clients.productdetails.productdetail";

        return view("clients.layout", [
            "title" => "Chi tiết sản phẩm",
            "template" => $template,
            'product' => $product,
            'relatedProducts' => $relatedProducts,
            'viewsCount' => $viewsCount,
            'averageRating' => $averageRating,
            'reviews' => $reviews,
            'selectedStar' => $request->star, // Thông tin để giữ trạng thái lọc
            'selectedSort' => $request->get('sort') // Thông tin để giữ trạng thái sắp xếp
        ]);
    }
}
