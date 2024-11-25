<?php

namespace App\Http\Controllers\Clients;

use App\Models\Ssd;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function shop(Request $request)
    {
        $template = "clients.shops.shop";
        $listDanhMuc = Category::all();
        $listColor = Color::all();
        $listSsd = Ssd::all();
        $listBrand=Brand::all();

        $listProduct = Product::withMin('productVariants', 'price')
            ->withMax('productVariants', 'price')
            ->withSum('productVariants', 'quantity')
            ->withAvg('reviews', 'star');

        // Lọc theo danh mục
        if ($request->input('category')) {
            $listProduct = $listProduct->where('category_id', $request->input('category'));
        }
        if ($request->input('brands')) {
            $listProduct = $listProduct->where('brand_id', $request->input('brands'));
        }
        if ($request->input('search')) {
            $listProduct = $listProduct->where('name', "LIKE", "%" . $request->input('search') . "%");
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

        if ($request->input('sort') && $request->input('sort') != 0) {
            switch ($request->input('sort')) {
                case "nameAZ":
                    $listProduct->orderBy('name');
                    break;
                case "nameZA":
                    $listProduct->orderByDesc('name');
                    break;
                case "priceAsc":
                    $listProduct->orderBy('product_variants_max_price');
                    break;
                case "priceDesc":
                    $listProduct->orderByDesc('product_variants_max_price');
                    break;
            }
        }

        $listProduct = Product::orderByDesc('created_at')->paginate(8);

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
                "listBrand"=>$listBrand

            ]
        );
    }
}
