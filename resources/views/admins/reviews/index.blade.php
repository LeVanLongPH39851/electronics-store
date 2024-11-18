<div class="container-xxl animated fadeInDown">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">{{ $title }}</h4>
                        </div><!--end col-->
                        <div class="col-auto">
                            <form id="form_filter" method="GET" action="{{ route('reviews.index') }}" class="row g-2">
                                <div class="col-auto">
                                    <select name="perPage" class="form-select" onchange="submitForm()">
                                        <option {{ request('perPage') == 10 ? 'selected' : '' }} value="10">Xem 10
                                            mục</option>
                                        <option {{ request('perPage') == 15 ? 'selected' : '' }} value="15">Xem 15
                                            mục</option>
                                        <option {{ request('perPage') == 30 ? 'selected' : '' }} value="30">Xem 30
                                            mục</option>
                                        <option {{ request('perPage') == 50 ? 'selected' : '' }} value="50">Xem 50
                                            mục</option>
                                        <option {{ request('perPage') == 100 ? 'selected' : '' }} value="100">Xem 100
                                            mục</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <select name="orderBy" class="form-select" onchange="submitForm()">
                                        <option {{ request('orderBy') == 'lastest' ? 'selected' : '' }} value="lastest">
                                            Mới nhất</option>
                                        <option {{ request('orderBy') == 'oldest' ? 'selected' : '' }} value="oldest">Cũ
                                            nhất</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <select name="status" class="form-select" onchange="submitForm()">
                                        <option {{ request('status') == 1 ? 'selected' : '' }} value="1">
                                            Active</option>
                                        <option {{ request('status') == 0 ? 'selected' : '' }} value="0">
                                            Inactive</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <select name="star" class="form-select" onchange="submitForm()">
                                        <option value="">Lọc theo sao</option>
                                        <option {{ request('3up') == 3 ? 'selected' : '' }} value="3up">Trên 3 sao
                                        </option>
                                        <option {{ request('star') == 5 ? 'selected' : '' }} value="5">5 sao
                                        </option>
                                        <option {{ request('star') == 4 ? 'selected' : '' }} value="4">4 sao
                                        </option>
                                        <option {{ request('star') == 3 ? 'selected' : '' }} value="3">3 sao
                                        </option>
                                        <option {{ request('star') == 2 ? 'selected' : '' }} value="2">2 sao
                                        </option>
                                        <option {{ request('star') == 1 ? 'selected' : '' }} value="1">1 sao
                                        </option>
                                    </select>
                                </div>
                                <div class="col-auto d-flex">
                                    <input type="text" id="keyword-input" class="form-control border-end-0"
                                        name="keyWord" value="{{ request('keyWord') }}"
                                        placeholder="Tìm sản phẩm hoặc nội dung đánh giá..."
                                        style="border-top-right-radius: 0; border-bottom-right-radius: 0">
                                    <button class="btn btn-info text-nowrap"
                                        style="border-top-left-radius: 0; border-bottom-left-radius: 0"
                                        onclick="validateAndSubmit()">Tìm kiếm</button>
                                </div>
                            </form>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-header-->
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table mb-0 checkbox-all">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Đánh giá</th>
                                    <th>Người đánh giá</th>
                                    <th>Sản phẩm</th>
                                    <th>Ngày thêm</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($reviewItems as $review)
                                    <tr>
                                        <td>{{ $review->id }}</td>
                                        <td>
                                            <a href="{{ route('reviews.show', $review->id) }}" class="me-1">
                                                @if ($review)
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <i class="fa{{ $i <= $review->star ? '-solid' : '-regular' }} fa-star"
                                                            style="color: {{ $i <= $review->star ? 'gold' : 'gray' }};"></i>
                                                    @endfor
                                            </a>
                                @endif
                                <div class="form-control-plaintext fs-6 text-truncate" style="max-width: 150px;">
                                    {{ $review->content }}
                                </div>
                                </td>
                                <td>
                                    <a href="{{ route('reviews.show', $review->id) }}" class="me-1">
                                        <img src="{{ '.' . Storage::url($review->user->image) }}" alt="image"
                                            class="thumb-md d-inline rounded-circle me-1">
                                    </a>
                                    <p class="d-inline-block align-middle mb-0">
                                        <a href="{{ route('reviews.show', $review->id) }}"
                                            class="d-inline-block align-middle mb-0 product-name">
                                            {{ $review->user->name }}
                                        </a>
                                    </p>
                                </td>
                                <td>
                                    <a href="{{ route('reviews.show', $review->id) }}" class="me-1">
                                        <img src="{{ '.' . Storage::url($review->product->image) }}" alt="image"
                                            height="40">
                                    </a>
                                    <p class="d-inline-block align-middle mb-0">
                                        <a href="{{ route('reviews.show', $review->id) }}"
                                            class="d-inline-block align-middle mb-0 product-name">
                                            {{ $review->product->name }}
                                        </a>
                                    </p>
                                </td>
                                <td>{{ date('d/m/Y', strtotime($review->created_at)) }}</td>
                                <td>
                                    <span
                                    class="badge bg-{{ $review->is_active === 1 ? 'success' : 'danger' }}-subtle text-{{ $review->is_active === 1 ? 'success' : 'danger' }} text-capitalize">
                                    <i class="fas fa-{{ $review->is_active === 1 ? 'check' : 'xmark' }} me-1"></i>
                                    {{ $review->is_active === 1 ? 'Active' : 'Inactive' }}
                                </span>
                                </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-danger">Không có mục này trong danh sách</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="nav-mt-3">
                            {{ $reviewItems->appends(request()->query())->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->
</div><!-- container -->


@section('script')
    <script>
        function submitForm() {
            document.getElementById('form_filter').submit();
        }

        function validateAndSubmit() {
            var keyword = document.getElementById('keyword-input').value;
            if (keyword.trim() === "") {
                alert("Vui lòng nhập từ khóa trước khi tìm kiếm");
                return false;
            }
            document.getElementById('form_filter').submit();
        }
    </script>
@endsection
