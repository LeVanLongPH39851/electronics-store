<?php

namespace App\Http\Controllers\Clients;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;

class HomeController extends Controller
{
    //Trang chủ client
    public function index()
    {
        $categories = Category::orderByDesc('created_at')->get();
        $newProducts = Product::withMin('productVariants', 'price') //Lấy giá thấp nhất
            ->withMax('productVariants', 'price') //Lấy giá cao nhất
            ->withSum('productVariants', 'quantity') //Lấy tổng số lượng
            ->orderByDesc('created_at')
            ->get();

        // Lấy các sản phẩm đang trong Flash Sale
        $flashSaleProducts = Product::whereHas('flashSales', function ($query) {
            $now = Carbon::now();
            $query->where('start_time', '<=', $now)
                ->where('end_time', '>=', $now);
        })
            ->with('flashSales') // Lấy thông tin flash sales liên quan đến sản phẩm
            ->orderByDesc('created_at')
            ->get();

        $template = "clients.homes.index";
        return view("clients.layout", [
            "title" => "Trang chủ",
            "template" => $template,
            "categories" => $categories,
            "newProducts" => $newProducts,
            "flashSaleProducts" => $flashSaleProducts,
        ]);
    }
}
