<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function productDetail(){
        $template = "clients.productdetails.productdetail";
        return view("clients.layout", ["title" => "Product Detail", "template" => $template]);
    }
}