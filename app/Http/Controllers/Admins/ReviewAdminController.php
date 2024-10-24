<?php

namespace App\Http\Controllers\Admins;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewAdminController extends Controller
{
    protected $classActive = "Đánh giá";
    public function index(Request $request)
    {
        $perPage = $request->get('perPage', 10); // Số mục trên mỗi trang (mặc định là 10)
        $orderBy = $request->get('orderBy', 'latest'); // Thứ tự sắp xếp
        $keyWord = $request->get('keyWord'); // Từ khóa tìm kiếm
        $star = $request->get('star'); // Lọc theo số sao
    
        $query = Review::with(['product', 'user']);
    
        // Nếu có từ khóa tìm kiếm
        if ($keyWord) {
            $query->where(function($q) use ($keyWord) {
                $q->whereHas('product', function ($qProduct) use ($keyWord) {
                    $qProduct->where('name', 'like', "%{$keyWord}%");
                })
                ->orWhereHas('user', function ($qUser) use ($keyWord) {
                    $qUser->where('name', 'like', "%{$keyWord}%");
                })
                ->orWhere('content', 'like', "%{$keyWord}%");
            });
        }
    
        // Nếu có lọc theo số sao
        if ($star) {
            $query->where('star', $star);
        }
    
        // Sắp xếp theo lựa chọn
        if ($orderBy === 'oldest') {
            $query->orderBy('created_at', 'asc');
        } else {
            $query->orderBy('created_at', 'desc');
        }
    
        $reviewItems = $query->paginate($perPage);
    
        $template = 'admins.reviews.index';
    
        return view('admins.layout', [
            'title' => 'Danh Sách Đánh Giá',
            'template' => $template,
            'classActive' => $this->classActive,
            'reviewItems' => $reviewItems,
        ]);
    }

    public function show($id)
    {
        // Lấy chi tiết wishlist item kèm sản phẩm và đánh giá
        $reviewItem = Review::with(['product', 'user'])
            ->findOrFail($id);

        return view('admins.reviews.show', compact('reviewItem'));
    }
}
