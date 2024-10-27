<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlashSale extends Model
{
    use HasFactory;
    protected $table = "flash_sales";

    protected $fillable = [
        "product_id",
        "flash_sale_price",
        "start_time",
        "end_time",
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
