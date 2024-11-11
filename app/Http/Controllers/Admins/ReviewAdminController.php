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
        $perPage = $request->get('perPage', 10); // hiện mặc định là 10 mục
        $orderBy = $request->get('orderBy', 'latest'); // thứ tự sắp xếp
        $keyWord = $request->get('keyWord'); // tìm kiếm
        $star = $request->get('star'); // lọc theo sao
        $status = $request->get('status');// lọc trạng thái
        $query = Review::with(['product', 'user']);

        //tìm kiếm
        if ($keyWord) {
            $query->where(function ($q) use ($keyWord) {
                $q->whereHas('product', function ($qProduct) use ($keyWord) {
                    $qProduct->where('name', 'like', "%{$keyWord}%"); //theo tên sp
                })
                    ->orWhereHas('user', function ($qUser) use ($keyWord) {
                        $qUser->where('name', 'like', "%{$keyWord}%"); //theo tên người dùng
                    })
                    ->orWhere('content', 'like', "%{$keyWord}%"); //theo nội dung
            });
        }

        //lọc sao
        if ($star == '3up') {
            $query->whereIn('star', [3, 4, 5]);
        } elseif ($star) {
            $query->where('star', $star);
        }

        // lọc tg
        if ($orderBy === 'oldest') {
            $query->orderBy('created_at', 'asc'); // cũ
        } else {
            $query->orderBy('created_at', 'desc'); // mới
        }
        
        // lọc trạng thái
        if ($status === "1") {
            $query->where('is_active', 1);
        } elseif ($status === "0") {
            $query->where('is_active', 0);
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

    public function show($id, Request $request)
    {
        $review = Review::with(['product', 'user'])->findOrFail($id);

        $template = "admins.reviews.show";
        if ($review) {
            return view('admins.layout', [
                'title' => 'Cập Nhật Khách Hàng',
                'template' => $template,
                'review' => $review,
                'classActive' => $this->classActive
            ]);
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'is_active' => 'required|boolean',
        ]);

        $review = Review::findOrFail($id);
        $review->is_active = $request->input('is_active');
        $review->save();

        // Redirect back to the show page with a success message
        return redirect()->route('reviews.show', $id)->with('success', 'Trạng thái đã được cập nhật!');
    }
}
