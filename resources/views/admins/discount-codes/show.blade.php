@extends('admin.layouts.app')

@section('content')
    <h1>Chi tiết mã giảm giá</h1>

    <table class="table">
        <tr>
            <th>ID:</th>
            <td>{{ $discountCode->id }}</td>
        </tr>
        <tr>
            <th>Mã:</th>
            <td>{{ $discountCode->code }}</td>
        </tr>
        <tr>
            <th>Loại giảm:</th>
            <td>{{ $discountCode->discount_type == 'amount' ? 'Số tiền' : 'Phần trăm' }}</td>
        </tr>
        <tr>
            <th>Giá trị giảm:</th>
            <td>{{ $discountCode->discount_value }}</td>
        </tr>
        @if($discountCode->discount_type == 'percent')
        <tr>
            <th>Giới hạn giảm tối đa:</th>
            <td>{{ $discountCode->max_discount }}</td>
        </tr>
        @endif
        <tr>
            <th>Số lần sử dụng:</th>
            <td>{{ $discountCode->usage_limit }}</td>
        </tr>
        <tr>
            <th>Ngày bắt đầu:</th>
            <td>{{ $discountCode->start_date }}</td>
        </tr>
        <tr>
            <th>Ngày kết thúc:</th>
            <td>{{ $discountCode->end_date }}</td>
        </tr>
    </table>

    <a href="{{ route('admin.discount-codes.edit', $discountCode->id) }}" class="btn btn-warning">Chỉnh sửa</a>
    <form action="{{ route('admin.discount-codes.destroy', $discountCode->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa mã giảm giá này?')">Xóa</button>
    </form>

    <a href="{{ route('admin.discount-codes.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
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
