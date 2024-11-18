<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary fw-bold">Chi Tiết Đánh Giá</h1>
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-5">
            @if (session('success'))
                <div class="alert alert-success rounded-3 text-center">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger rounded-3 text-center">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mb-2 d-flex justify-content-between">

                <div>
                    <div class="mb-2 d-flex align-items-center">
                        <label class="form-label text-secondary fs-6">Đánh Giá: </label>
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="fa{{ $i <= $review->star ? '-solid' : '-regular' }} fa-star mb-2 ms-1"
                                style="color: {{ $i <= $review->star ? 'gold' : 'gray' }};"></i>
                        @endfor
                    </div>

                    <div class="mb-2 d-flex">
                        <label class="form-label text-secondary fs-6 mt-1 me-2">Nội Dung:</label>
                        <div class="form-control-plaintext fs-6" style="max-width: 400px;">
                            {{ $review->content }}
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label text-secondary fs-6">Ngày Đăng:</label>
                        <p class="form-control-plaintext fs-6 ms-5">{{ $review->created_at->format('H:i - d/m/Y') }}</p>
                    </div>

                    <div class="mb-2">
                        <label class="form-label text-secondary fs-6">Ngày Sửa Đổi:</label>
                        <p class="form-control-plaintext fs-6 ms-5">{{ $review->updated_at->format('H:i - d/m/Y') }}</p>
                    </div>

                    <div class="mb-2 ">
                        <label class="form-label text-secondary fs-6">Trạng Thái:</label>
                        <p class="form-control-plaintext fs-6 ms-5">{{ $review->is_active ? 'Đang hiển thị' : 'Đã ẩn' }}</p>
                    </div>
                </div>

                <div>
                    <div class="mb-4 text-center">
                        {{-- <label class="form-label me-3 text-secondary fs-6"> Người Đánh
                            Giá:</label> --}}
                        <img src="{{ '.' . Storage::url($review->user->image) }}" alt="User Image" height="100"
                            class="rounded-circle shadow-sm me-3">
                        <b class="form-control-plaintext fs-6 me-2">{{ $review->user->name }}</b>
                    </div>
                    <div class="mb-4 text-center">
                        {{-- <label class="form-label me-3 text-secondary fs-6"></i> Sản Phẩm:</label> --}}
                        <img src="{{ '.' . Storage::url($review->product->image) }}" alt="Product Image" height="100px" width="100px"
                            class="rounded-3 shadow-sm me-3">
                        <b class="form-control-plaintext fs-6 me-2">{{ $review->product->name }}</b>
                    </div>
                </div>

                <form method="POST" action="{{ route('reviews.update', $review->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label for="is_active" class="form-label text-secondary fs-6"><i
                        class="bi bi-pencil-square"></i>
                    Cập Nhật Trạng Thái:</label>
                    <div class="mb-4 d-flex justify-content-end">
                        
                        <select name="is_active" id="is_active" class="form-select w-auto fs10 me-1">
                            <option value="1" {{ $review->is_active ? 'selected' : '' }}>Hiện</option>
                            <option value="0" {{ !$review->is_active ? 'selected' : '' }}>Ẩn</option>
                        </select>
                        <button type="submit" class="btn btn-primary rounded-3">Lưu</button>
                    </div>
                </form>
            </div>
            
            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('reviews.index') }}" class="btn btn-outline-secondary rounded-3 me-2">Trở Về</a>  
            </div>
            
        </div>
    </div>
</div>
