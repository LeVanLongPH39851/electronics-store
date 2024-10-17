<?php

namespace App\Http\Controllers\Clients;

use App\Models\DiscountCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscountCodeController extends Controller
{
    public function applyDiscount(Request $request)
    {
        // Lấy thông tin mã giảm giá từ yêu cầu
        $code = $request->input('code');
        $totalAmount = $request->input('total_amount');
        $customerId = auth()->id(); // ID khách hàng hiện tại
    
        $discountCode = DiscountCode::where('code', $code)
                                    ->where('start_date', '<=', now())
                                    ->where('end_date', '>=', now())
                                    ->first();
    
        if (!$discountCode || ($discountCode->usage_limit && $discountCode->used_count >= $discountCode->usage_limit)) {
            return response()->json(['error' => 'Invalid or expired discount code'], 400);
        }
    
        // Kiểm tra mã giảm giá có chỉ định khách hàng
        if ($discountCode->customers()->where('customer_id', $customerId)->doesntExist()) {
            return response()->json(['error' => 'You are not eligible for this discount'], 400);
        }

        // Tính toán giảm giá
        $discountAmount = 0;
        if ($discountCode->discount_type == 'percent') {
            // Giảm theo %
            $discountAmount = min($totalAmount * ($discountCode->discount_value / 100), $discountCode->max_discount);
        } else {
            // Giảm theo số tiền cố định
            $discountAmount = $discountCode->discount_value;
        }

        // Trả về số tiền giảm
        return response()->json([
            'success' => true,
            'discount_amount' => $discountAmount
        ]);
    }

    public function updateUsageCount($code)
    {
        $discountCode = DiscountCode::where('code', $code)->first();
        if ($discountCode) {
            $discountCode->increment('used_count');
        }
    }
}
