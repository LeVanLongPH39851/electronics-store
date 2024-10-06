<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $table = "discounts";
    protected $fillable = [
        'discount_code',
        'permanent',
        'percent',
        'minimum_spend',
        'maximum_spend',
        'limit',
        'product_ids'
    ];
}
