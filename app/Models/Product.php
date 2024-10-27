<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;
use App\Models\Brand;
use App\Models\User;
use App\Models\ProductVariant;
use App\Models\Gallery;
use App\Models\OrderDetail;
use Carbon\Carbon;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "products";

    protected $fillable = [
        "product_code",
        "name",
        "image",
        "short_description",
        "description",
        "view",
        "status",
        "is_hot",
        "category_id",
        "brand_id",
        "user_id",
        "deleted_at"
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id');
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'product_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'product_id');
    }
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'product_id');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Flash Sale

    public function flashSales()
    {
        return $this->hasMany(FlashSale::class); //1-n
    }

    // Lấy Flash Sale hiện tại (nếu có)
    public function getCurrentFlashSale()
    {
        return $this->flashSales()->where('start_time', '<=', Carbon::now())
            ->where('end_time', '>=', Carbon::now())
            ->first();
    }

    // Lấy giá hiện tại, nếu có Flash Sale đang diễn ra thì lấy giá Flash Sale
    public function getCurrentPrice()
    {
        $flashSale = $this->getCurrentFlashSale();

        if ($flashSale) {
            return $flashSale->flash_sale_price;
        }

        return $this->price; // Giá gốc nếu không có Flash Sale
    }
}
