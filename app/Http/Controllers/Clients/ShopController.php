<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shop(){
        $template = "clients.shops.shop";
        return view("clients.layout", ["title" => "Shop", "template" => $template]);
    }

}
