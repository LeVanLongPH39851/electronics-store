<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable = [
        'order_code',
        'status',
        'payment_method',
        'name',
        'email',
        'phone',
        'address',
        'discount_id',
        'user_id'
    ];
}
