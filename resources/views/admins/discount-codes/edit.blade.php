@extends('admin.layouts.app')

@section('content')
    <h1>Chỉnh sửa mã giảm giá</h1>
    
    <form action="{{ route('admin.discount-codes.update', $discountCode->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="code">Mã giảm giá</label>
            <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $discountCode->code) }}" required>
        </div>

        <div class="form-group">
            <label for="discount_type">Loại giảm</label>
            <select name="discount_type" id="discount_type" class="form-control" required>
                <option value="amount" {{ $discountCode->discount_type == 'amount' ? 'selected' : '' }}>Số tiền</option>
                <option value="percent" {{ $discountCode->discount_type == 'percent' ? 'selected' : '' }}>Phần trăm</option>
            </select>
        </div>

        <div class="form-group">
            <label for="discount_value">Giá trị giảm</label>
            <input type="number" class="form-control" id="discount_value" name="discount_value" value="{{ old('discount_value', $discountCode->discount_value) }}" required>
        </div>

        <div class="form-group">
            <label for="max_discount">Giới hạn giảm tối đa (nếu là %)</label>
            <input type="number" class="form-control" id="max_discount" name="max_discount" value="{{ old('max_discount', $discountCode->max_discount) }}">
        </div>

        <div class="form-group">
            <label for="usage_limit">Số lần sử dụng</label>
            <input type="number" class="form-control" id="usage_limit" name="usage_limit" value="{{ old('usage_limit', $discountCode->usage_limit) }}">
        </div>

        <div class="form-group">
            <label for="start_date">Ngày bắt đầu</label>
            <input type="datetime-local" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $discountCode->start_date->format('Y-m-d\TH:i')) }}" required>
        </div>

        <div class="form-group">
            <label for="end_date">Ngày kết thúc</label>
            <input type="datetime-local" class="form-control" id="end_date" name="end_date" value="{{ old('end_date', $discountCode->end_date->format('Y-m-d\TH:i')) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
    </form>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
