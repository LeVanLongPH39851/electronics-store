<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = "wishlist_items";

    protected $fillable = [
        'user_id',
        'product_id'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function review()
    {
        return $this->hasOne(Review::class, 'product_id', 'product_id')
            ->whereColumn('user_id', 'wishlist_items.user_id');
    }
}
