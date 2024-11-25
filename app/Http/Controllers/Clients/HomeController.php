<?php

namespace App\Http\Controllers\Clients;

use Carbon\Carbon;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\SlideShow;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //Trang chủ client

    public function index(Request $request)
    {
        $slideShow = SlideShow::where('active', 'on')->first();
        $categories = Category::orderByDesc('created_at')->get();
        $brand =Brand::all();
        $listProducts=Product::all();
        $newProducts = Product::withMin('productVariants', 'price') //Lấy giá thấp nhất
            ->withMax('productVariants', 'price') //Lấy giá cao nhất
            ->withSum('productVariants', 'quantity') //Lấy tổng số lượng
            ->orderByDesc('created_at')
            ->get();
        //san pham ban chay
            $query = Product::withSum('orderDetails', 'quantity')
            ->withMax('productVariants', 'price')
            ->withMin('productVariants', 'price')
            ->having('order_details_sum_quantity', '>', 0)
            ->orderByDesc('order_details_sum_quantity')
            ->take($request->input('topSelling') ?? 5)
            ->get();
         // Lấy sản phẩm nổi bật dựa trên lượt xem
            $featuredProducts = Product::withMin('productVariants', 'price')
            ->withMax('productVariants', 'price')
             ->orderByDesc('view')
             ->take(4)
             ->get();

             $ratedProducts = Product::select('products.id', 'products.name', 'products.image')
             ->join('reviews', 'reviews.product_id', '=', 'products.id')
             ->selectRaw('AVG(reviews.star) as avg_star')
             ->groupBy('products.id', 'products.name', 'products.image') // Nhóm theo các cột được chọn
             ->withMin('productVariants', 'price')
             ->withMax('productVariants', 'price')
             ->orderBy('avg_star')
             ->take(5)
             ->get();
             if ($request->input('brands')) {
                $listProducts = $listProducts->where('brand_id', $request->input('brands'));
            }
        $template = "clients.homes.index";
        return view("clients.layout", [

            "title" => "Trang chủ",
            "template" => $template,
            "categories" => $categories,
            "newProducts" => $newProducts,
            "slideShow" => $slideShow,
            "bestSellingProduct" => $query,
            "featuredProducts" =>$featuredProducts,
            "ratedProducts"=> $ratedProducts,
            "listProducts"=>$listProducts,
            "brand"=>$brand
        ]);
    }
}
