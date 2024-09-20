<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function account(){
        $template = "clients.accounts.account";
        return view("clients.layout", ["title" => "Account", "template" => $template]);
    }

    public function orderDetail(){
        $template = "clients.accounts.orderdetail";
        return view("clients.layout", ["title" => "Order Detail", "template" => $template]);
    }
}