<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Trang chủ client
    public function index(){
        $template = "clients.homes.index";
        return view("clients.layout", ["title" => "Home", "template" => $template]);
    }
}