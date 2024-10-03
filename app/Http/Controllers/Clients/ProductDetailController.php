<?php

namespace App\Http\Controllers\Clients;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductDetailController extends Controller
{
    public function productDetail(string $id){
        
        $product = Product::withMin('productVariants', 'price')
        ->withMax('productVariants', 'price')
        ->withSum('productVariants', 'quantity')
        ->find($id);;

        if($product){
            $template = "clients.productdetails.productdetail";
            return view("clients.layout", ["title" => "Chi tiết sản phẩm", "template" => $template, 'product' => $product]);
        }
        
        return redirect()->back()->with('error', 'Không tìm thấy sản phẩm');
    }
}