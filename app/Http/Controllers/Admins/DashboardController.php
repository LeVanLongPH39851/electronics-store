<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $classActive = "Thống Kê"; //Dùng để thêm class active vào thẻ <li> ở sidebar
    
    //Dashboard admin
    public function index(){
        $template = 'admins.dashboards.index'; //Tạo biến template để include vào content của layout
        return view('admins.layout', ['title' => 'Admin', 'template' => $template, 'classActive' => $this->classActive]);
    }
}