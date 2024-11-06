<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FlashSaleController extends Controller
{
    //
    protected $classActive = "Chương trình giảm giá";
    public function index()
    {
        $flashsale = FlashSale::all();
        // dd($fl);
        $template = 'admins.flashsales.list';


        return view('admins.layout', [
            'title' => 'Danh Sách Flash Sale',
            'template' => $template,
            'classActive' => $this->classActive,
            'flashsale' => $flashsale
        ]);
    }
} 
