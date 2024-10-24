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
                                        <option {{ request('perPage') == 8 ? 'selected' : '' }} value="8">8 mục</option>
                                        <option {{ request('perPage') == 10 ? 'selected' : '' }} value="10">10 mục</option>
                                        <option {{ request('perPage') == 12 ? 'selected' : '' }} value="12">12 mục</option>
                                        <option {{ request('perPage') == 15 ? 'selected' : '' }} value="15">15 mục</option>
                                        <option {{ request('perPage') == 18 ? 'selected' : '' }} value="18">18 mục</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <select name="orderBy" class="form-select" onchange="submitForm()">
                                        <option {{ request('orderBy') == 'lastest' ? 'selected' : '' }} value="lastest">Mới nhất</option>
                                        <option {{ request('orderBy') == 'oldest' ? 'selected' : '' }} value="oldest">Cũ nhất</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <select name="star" class="form-select" onchange="submitForm()">
                                        <option value="">Chọn số sao</option>
                                        <option {{ request('star') == 5 ? 'selected' : '' }} value="5">5 sao</option>
                                        <option {{ request('star') == 4 ? 'selected' : '' }} value="4">4 sao</option>
                                        <option {{ request('star') == 3 ? 'selected' : '' }} value="3">3 sao</option>
                                        <option {{ request('star') == 2 ? 'selected' : '' }} value="2">2 sao</option>
                                        <option {{ request('star') == 1 ? 'selected' : '' }} value="1">1 sao</option>
                                    </select>
                                </div>
                                <div class="col-auto d-flex">
                                    <input type="text" id="keyword-input" class="form-control border-end-0"
                                        name="keyWord" value="{{ request('keyWord') }}" placeholder="Tìm sản phẩm..."
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
                                    <th>Tên sản phẩm</th>
                                    <th>Người đánh giá</th>
                                    <th>Đánh giá</th>
                                    <th>Ngày thêm</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($reviewItems as $review)
                                <tr>
                                    <td>{{ $review->id }}</td>
                                    <td>
                                        {{-- <a href="{{ route('reviews.show', $review) }}" class="me-1"> --}}
                                            <img src="{{ '.' . Storage::url($review->product->image) }}" alt="" height="40">
                                        {{-- </a> --}}
                                        <p class="d-inline-block align-middle mb-0">
                                            {{-- <a href="{{ route('reviews.show', $review) }}" class="d-inline-block align-middle mb-0 product-name"> --}}
                                                {{ $review->product->name }}
                                            {{-- </a>  --}}
                                        </p>
                                    </td>
                                    <td>
                                        {{-- <a href="{{ route('reviews.show', $review) }}" class="me-1"> --}}
                                            <img src="{{ '.' . Storage::url($review->user->image) }}" alt="" height="40">
                                        {{-- </a> --}}
                                        <p class="d-inline-block align-middle mb-0">
                                            {{-- <a href="{{ route('reviews.show', $review) }}" class="d-inline-block align-middle mb-0 product-name"> --}}
                                                {{ $review->user->name }}
                                            {{-- </a>  --}}
                                        </p>
                                    </td>
                                    <td>
                                        @if ($review)
                                            {{ $review->star }} sao - {{ $review->content }}
                                        @else
                                            Chưa có đánh giá
                                        @endif
                                    </td>
                                    <td>{{ date('d/m/Y', strtotime($review->created_at)) }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-danger">Không có mục này danh sách</td>
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
