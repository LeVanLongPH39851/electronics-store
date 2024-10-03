<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Ssd;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shop(Request $request)
    {
        $template = "clients.shops.shop";
        $listDanhMuc = Category::all();
        $listColor = Color::all();
        $listSsd = Ssd::all();


        $listProduct = Product::withMin('productVariants', 'price')
            ->withMax('productVariants', 'price')
            ->withSum('productVariants', 'quantity')
            ->orderByDesc('created_at');

        // Lọc theo danh mục
        if ($request->input('category_filter')) {
            $categoryFilter = $request->input('category_filter');

            $listProduct = $listProduct->where('category_id', $categoryFilter);
        }

        if ($request->input('price_filter')) {
            $priceFilter = $request->input('price_filter');

            switch ($priceFilter) {
                case '1-5':
                    $listProduct->whereHas('productVariants', function ($query) {
                        $query->where('price', '>=', 1)->where('price', '<=', 5000000);
                    });
                    break;
                case '5-10':
                    $listProduct->whereHas('productVariants', function ($query) {
                        $query->where('price', '>=', 5000000)->where('price', '<=', 10000000);
                    });
                    break;
                case '10-20':
                    $listProduct->whereHas('productVariants', function ($query) {
                        $query->where('price', '>=', 10000000)->where('price', '<=', 20000000);
                    });
                    break;
                case '20-30':
                    $listProduct->whereHas('productVariants', function ($query) {
                        $query->where('price', '>=', 20000000)->where('price', '<=', 30000000);
                    });
                    break;
                case '30-40':
                    $listProduct->whereHas('productVariants', function ($query) {
                        $query->where('price', '>=', 30000000)->where('price', '<=', 40000000);
                    });
                    break;
                case '40-50':
                    $listProduct->whereHas('productVariants', function ($query) {
                        $query->where('price', '>=', 40000000)->where('price', '<=', 50000000);
                    });
                    break;
                default:
                    $listProduct->whereHas('productVariants', function ($query) {
                        $query->where('price', '>=', 50000000);
                    });
                    break;
            }

            $price = $priceFilter;
        } else {
            $price = 0;
        }

        $listProduct = $listProduct->get();
        // dd($listProduct);

        // Lọc theo danh mục
        if ($request->input('category_filter')) {
            $categoryFilter = $request->input('category_filter');

            $listProduct->where('category_id', $categoryFilter);
        }

        return view(
            "clients.layout",
            [
                "title" => "Shop",
                "template" => $template,
                "listDanhMuc" => $listDanhMuc,
                "listColor" => $listColor,
                "listSsd" => $listSsd,
                "listProduct" => $listProduct,
                'price' =>  $price,

            ]
        );
    }
}
