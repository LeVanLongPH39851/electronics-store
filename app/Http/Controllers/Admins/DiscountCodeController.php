<?php

namespace App\Http\Controllers\Admins;

use App\Models\DiscountCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscountCodeController extends Controller
{
    protected $classActive = "Mã Giảm Giá";
    public function index()
    {
        $discountCodes = DiscountCode::all();
        // return view('admin.discount_codes.index', compact('discountCodes'));
        $template = 'admins.discount-codes.index';
        return view('admins.layout', [
            'title' => 'Danh Sách Mã Giảm Giá',
            'template' => $template,
            'classActive' => $this->classActive,
            'discountCodes' => $discountCodes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('admin.discount_codes.create');
        $template = 'admins.discount-codes.create';
        return view('admins.layout', [
            'title' => 'Tạo Mới Mã Giảm Giá',
            'template' => $template,
            'classActive' => $this->classActive,
            // 'discountCodes' => $discountCodes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:discount_codes',
            'discount_type' => 'required|in:amount,percent',
            'discount_value' => 'required|numeric',
            'max_discount' => 'nullable|numeric',
            'usage_limit' => 'nullable|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date'
        ]);

        DiscountCode::create($request->all());

        return redirect()->route('discount-codes.index')->with('success', 'Mã giảm giá đã được tạo');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $discountCode = DiscountCode::findOrFail($id);
        return view('admin.discount-codes.show', compact('discountCode'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $discountCode = DiscountCode::findOrFail($id);
        return view('admin.discount-codes.edit', compact('discountCode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'code' => 'required|unique:discount-codes,code,' . $id,
            'discount_type' => 'required|in:amount,percent',
            'discount_value' => 'required|numeric',
            'max_discount' => 'nullable|numeric',
            'usage_limit' => 'nullable|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date'
        ]);

        $discountCode = DiscountCode::findOrFail($id);
        $discountCode->update($request->all());

        return redirect()->route('admin.discount-codes.index')->with('success', 'Mã giảm giá đã được cập nhật');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $discountCode = DiscountCode::findOrFail($id);
        $discountCode->delete();

        return redirect()->route('admin.discount-codes.index')->with('success', 'Mã giảm giá đã bị xóa');
    }
}
