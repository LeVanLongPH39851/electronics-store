<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'discount_type',
        'discount_value',
        'max_discount',
        'usage_limit',
        'used_count',
        'start_date',
        'end_date'
    ];

    protected $dates = ['start_date', 'end_date'];
}
