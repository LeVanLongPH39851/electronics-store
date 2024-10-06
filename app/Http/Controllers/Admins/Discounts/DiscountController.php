<?php

namespace App\Http\Controllers\Admins\Discounts;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    protected $classActive = "Mã Giảm Giá";

    public function index()
    {
        $discounts = Discount::all();
        $template = 'admins.discounts.list';
        return view('admins.layout', [
            'title' => 'Danh Sách Mã Giảm Giá',
            'template' => $template,
            'classActive' => $this->classActive,
            'discounts' => $discounts,
        ]);
    }

    public function create()
    {
        $template = 'admins.discounts.create';
        return view('admins.layout', [
            'title' => 'Thêm Mới Mã Giảm Giá',
            'template' => $template,
            'classActive' => $this->classActive,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'discount_code' => 'required|string|max:20|unique:discounts',
            'permanent' => 'nullable|integer',
            'percent' => 'nullable|integer',
            'minimum_spend' => 'nullable|integer',
            'maximum_spend' => 'nullable|integer',
            'limit' => 'nullable|integer',
            'product_ids' => 'required|string|max:40',
        ], [
            'discount_code.required' => 'Mã giảm giá không được để trống.',
            'discount_code.unique' => 'Mã giảm giá đã tồn tại.',
            'percent.required' => 'Phần trăm giảm giá không được để trống.',
            'percent.min' => 'Giá trị giảm giá không được âm.',
            'percent.max' => 'Giá trị giảm giá không được vượt quá 100%.',
            'minimum_spend.required' => 'Chi tiêu tối thiểu không được để trống.',
            'minimum_spend.min' => 'Chi tiêu tối thiểu không được âm.',
            'maximum_spend.required' => 'Chi tiêu tối đa không được để trống.',
            'maximum_spend.min' => 'Chi tiêu tối đa không được âm.',
            'limit.min' => 'Giới hạn sử dụng phải lớn hơn 0.',
        ]);
        Discount::create($request->all());
        return redirect()->route('discounts.index')->with('success', 'Mã giảm giá đã được thêm thành công.');
    }

    public function edit($id)
    {
        $discount = Discount::findOrFail($id);
        return view('admins.layout', [
            'title' => 'Sửa Mã Giảm Giá',
            'template' => 'admins.discounts.edit',
            'classActive' => $this->classActive,
            'discount' => $discount,
        ]);
    }

    public function update(Request $request, Discount $discount)
    {
        $request->validate([
            'discount_code' => 'required|string|max:20|unique:discounts,discount_code,' . $discount->id,
            'permanent' => 'nullable|integer',
            'percent' => 'nullable|integer',
            'minimum_spend' => 'nullable|integer',
            'maximum_spend' => 'nullable|integer',
            'limit' => 'nullable|integer',
            'product_ids' => 'required|string|max:40',
        ], [
            'discount_code.required' => 'Mã giảm giá không được để trống.',
            'discount_code.unique' => 'Mã giảm giá đã tồn tại.',
            'percent.required' => 'Phần trăm giảm giá không được để trống.',
            'percent.min' => 'Giá trị giảm giá không được âm.',
            'percent.max' => 'Giá trị giảm giá không được vượt quá 100%.',
            'minimum_spend.required' => 'Chi tiêu tối thiểu không được để trống.',
            'minimum_spend.min' => 'Chi tiêu tối thiểu không được âm.',
            'maximum_spend.required' => 'Chi tiêu tối đa không được để trống.',
            'maximum_spend.min' => 'Chi tiêu tối đa không được âm.',
            'limit.min' => 'Giới hạn sử dụng phải lớn hơn 0.',
        ]);
        $discount->update($request->all());
        return redirect()->route('discounts.index')->with('success', 'Mã giảm giá đã được cập nhật thành công.');
    }

    public function destroy(String $id)
    {
        Discount::destroy($id);
        return redirect()->route('discount.index')->with('success', 'Xóa thành công');
    }
}
