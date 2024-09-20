<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart(){
        $template = "clients.carts.cart";
        return view("clients.layout", ["title" => "Cart", "template" => $template]);
    }
}