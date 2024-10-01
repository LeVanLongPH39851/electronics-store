<?php

namespace App\Http\Controllers\Admins;

use App\Models\Ssd;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\ProductRequest;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $classActive = "Sản Phẩm";

    public function index()
    {
        $products = Product::with('category')  // Nối thêm bảng category
        ->withMin('productVariants', 'price')  // Lấy giá min của productVariants
        ->withMax('productVariants', 'price')  // Lấy giá max của productVariants
        ->withSum('productVariants', 'quantity') // Lấy tổng số lượng
        ->orderByDesc('created_at')
        ->paginate(8);

        $template = 'admins.products.list'; //Tạo biến template để include vào content của layout

        return view('admins.layout', [
         'title' => 'Danh Sách Sản Phẩm',
         'template' => $template,
         'classActive' => $this->classActive,
         'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colors = Color::orderBy('created_at')->get();
        $ssds = Ssd::orderBy('created_at')->get();
        $brands = Brand::orderBy('created_at')->get();
        $categories = Category::orderBy('created_at')->get();

        $template = "admins.products.create";

        return view('admins.layout', [
         'title' => 'Tạo Mới Sản Phẩm',
         'template' => $template,
         'classActive' => $this->classActive,
         'colors' => $colors,
         'ssds' => $ssds,
         'brands' => $brands,
         'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        if($request->isMethod('POST')){

            if(!Category::where("id", $request->input('category'))->exists() || !Brand::where("id", $request->input('brand'))->exists()){
                return redirect()->back()->with('error', 'Thêm mới sản phẩm thất bại');
            }

            if($request->hasFile('images')){
               if(count($request->file('images')) !== count($request->input('variant'))){
                return redirect()->back()->with('error', 'Vui lòng nhập đầy đủ ảnh biến thể');
               } 
            }else{
                return redirect()->back()->with('error', 'Vui lòng nhập đầy đủ ảnh biến thể');
            }

            //Thêm sản phẩm
            $product_code = "PR-".Str::random(5); //Tạo một mã bất kỳ
            $userExists = Product::where('product_code', $product_code)->exists(); //Xem mã có bị trùng không

            if($userExists){ //Nếu trùng thông báo lỗi
                return redirect()->back()->with('error','Tạo mới sản phẩm thất bại');
            }

            $image = $request->file('image')->store('uploads/products', "public");

            $product = Product::create([
                "product_code" => $product_code,
                "name" => $request->input('name'),
                "image" => $image,
                "short_description" => $request->input('short-description'),
                "description" => $request->input('description'),
                "status" => $request->input('status') ? "active" : "banned",
                "is_hot" => $request->input('hot') ? "yes" : "no",
                "category_id" => $request->input('category'),
                "brand_id" => $request->input('brand'),
                "user_id" => Auth::id()
            ]);
            
            //Thêm nhiều ảnh
            if ($request->hasFile('galleries')) {
                foreach ($request->file('galleries') as $file) {
                    // Kiểm tra file có phải là ảnh
                    if (in_array($file->getMimeType(), ['image/jpeg', 'image/png', 'image/gif'])) {
                        $path = $file->store('uploads/galleries/product_'.$product->id, 'public');
                        $type = "image";
                    }
                    // Kiểm tra file có phải là video
                    elseif (in_array($file->getMimeType(), ['video/mp4', 'video/mov', 'video/ogg'])) {
                        $path = $file->store('uploads/videos', 'public');
                        $type = "video";
                    }
                    
                    Gallery::create([
                        'path' => $path,
                        'type' => $type,
                        'product_id' => $product->id,
                    ]);
                }
            }

            //Thêm biến thể
            if($request->input('variants')){
                foreach($request->input('variants') as $index => $variant){

                    if($request->file('images')[$index]){
                        $imageVariant = $request->file('images')[$index]->store('uploads/product_variants/product_'.$product->id, "public");
                    }

                     ProductVariant::create([
                        'image' => $imageVariant,
                        'import_price' => $request->input('importPrices')[$index],
                        'listed_price' => $request->input('listedPrices')[$index],
                        'price' => $request->input('prices')[$index],
                        'quantity' => $request->input('quantities')[$index],
                        'color_id' => $request->input('colors')[$index],
                        'ssd_id' => $request->input('ssds')[$index],
                        'product_id' => $product->id
                     ]);
                }
            }

            return redirect()->route('product.index')->with("success", "Thêm mới sản phẩm thành công");
        }

        return redirect()->back()->with("error", "Thêm mới sản phẩm thất bại");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);

        if($product){

            $product = Product::withMin('productVariants', 'price')
            ->withMax('productVariants', 'price')
            ->withSum('productVariants', 'quantity')
            ->find($id);

            $template = 'admins.products.detail'; //Tạo biến template để include vào content của layout
            
            return view('admins.layout', [
           'title' => 'Chi Tiết Sản Phẩm',
           'template' => $template,
           'classActive' => $this->classActive,
           'product' => $product
        ]);
        }

        return redirect()->back()->with('error', 'Không tìm thấy sản phẩm');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if($product){
           $product->delete();
           return redirect()->back()->with("success", "Chuyển vào thùng rác thành công");
        }

        return redirect()->back()->with('error', 'Không tìm thấy sản phẩm');
    }
}