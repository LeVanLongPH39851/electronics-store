<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(){
        $template = "clients.checkouts.checkout";
        return view("clients.layout", ["title" => "Checkout", "template" => $template]);
    }
}