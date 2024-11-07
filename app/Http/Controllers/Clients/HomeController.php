<?php

namespace App\Http\Controllers\Clients;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;

use App\Models\SlideShow;

class HomeController extends Controller
{
    //Trang chủ client

    public function index()
    {
        $slideShow = SlideShow::where('active', 'on')->first();
        $categories = Category::orderByDesc('created_at')->get();
        $newProducts = Product::withMin('productVariants', 'price') //Lấy giá thấp nhất
            ->withMax('productVariants', 'price') //Lấy giá cao nhất
            ->withSum('productVariants', 'quantity') //Lấy tổng số lượng
            ->orderByDesc('created_at')
            ->get();


        $template = "clients.homes.index";
        return view("clients.layout", [

            "title" => "Trang chủ",
            "template" => $template,
            "categories" => $categories,
            "newProducts" => $newProducts,
            "title" => "Trang chủ",
            "template" => $template,
            "categories" => $categories,
            "newProducts" => $newProducts,
            "slideShow" => $slideShow
        ]);
    }
}
