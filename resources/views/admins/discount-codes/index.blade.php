    <h1>Danh sách mã giảm giá</h1>
    
    <a href="{{ route('discount-codes.create') }}" class="btn btn-primary">Tạo mã giảm giá mới</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã</th>
                <th>Loại giảm</th>
                <th>Giá trị</th>
                <th>Bắt đầu</th>
                <th>Kết thúc</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($discountCodes as $discount)
            <tr>
                <td>{{ $discount->id }}</td>
                <td>{{ $discount->code }}</td>
                <td>{{ $discount->discount_type }}</td>
                <td>{{ $discount->discount_value }}</td>
                <td>{{ $discount->start_date }}</td>
                <td>{{ $discount->end_date }}</td>
                <td>
                    <a href="{{ route('discount-codes.edit', $discount->id) }}" class="btn btn-warning">Sửa</a>
                    <form action="{{ route('discount-codes.destroy', $discount->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa mã giảm giá này?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
