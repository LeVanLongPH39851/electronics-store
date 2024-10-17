<?php

namespace App\Http\Controllers\Clients;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductDetailController extends Controller
{
    public function productDetail(string $id)
    {

        $product = Product::withMin('productVariants', 'price') //Lấy giá thấp nhất
            ->withMax('productVariants', 'price') //Lấy giá cao nhất
            ->withSum('productVariants', 'quantity') //Lấy tổng số lượng
            ->find($id);

        $product1 = Product::findOrFail($id);

        // Assuming you have a way to fetch related products
        $relatedProducts = Product::where('category_id', $product1->category_id)
            ->where('id', '!=', $id) // Exclude the current product
            ->take(4) // Limit the number of related products if desired
            ->get();

        if ($product) {
            $template = "clients.productdetails.productdetail";
            return view("clients.layout", ["title" => "Chi tiết sản phẩm", "template" => $template, 'product' => $product, 'relatedProducts' => $relatedProducts]);
        }

        return redirect()->back()->with('error', 'Không tìm thấy sản phẩm');
    }
}
