<div class="container mt-5">
    <h2 class="mt-4 mb-4 text-start">{{ $totalReviews }} đánh giá {{ $product->name }}</h2>
    <div class="row">

        <div class="col-md-4 text-center mt-4 mb-4">
            <img src="{{ '.' . Storage::url($product->image) }}" alt="Product Image" height="200px"
                class="rounded-3 shadow-sm me-3">
            <h5>{{ $product->name }}</h5>
        </div>

        <div class="col-md-4 mb-4">
            <div class="d-flex align-items-center mb-4">
                <h4>
                    {{ number_format($averageRating, 1) }}
                    <i class="fa-solid fa-star" style="color: gold"></i>
                </h4>
                <p class="ms-4">{{ $totalReviews }} đánh giá</p>
            </div>

            <div class="rating-distribution">
                @for ($i = 5; $i >= 1; $i--)
                    <div class="d-flex align-items-center text-center">
                        <p class="mb-5">{{ $i }} <i class="fa-solid fa-star"></i></p>
                        <div class="progress flex-grow-1 mx-3">
                            <div class="progress-bar bg-warning" role="progressbar"
                                style="width: {{ $starPercentages[$i] }}%;" aria-valuenow="{{ $starPercentages[$i] }}"
                                aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                        <p class="mb-5">{{ round($starPercentages[$i]) }}%</p>
                    </div>
                @endfor
            </div>
        </div>
    </div>
    <h6 class="mt-4 mb-4">Lọc đánh giá:</h6>
    <form method="GET" action="" class="d-flex justify-content-start mb-4 justify-content-between" id="form_filter">
        <div class="me-3 d-flex align-items-center">
            <button type="submit" name="star" value="all"
                class="btn btn-outline-success text-dark custom-hover rounded-pill me-2 {{ request('star') == 'all' || !request('star') ? 'active' : '' }}">
                Tất cả
            </button>

            @for ($i = 5; $i >= 1; $i--)
                <button type="submit" name="star" value="{{ $i }}"
                    class="btn btn-outline-success text-dark custom-hover rounded-pill me-2 {{ request('star') == $i ? 'active' : '' }}">
                    {{ $i }} <i class="fa-solid fa-star" style="color: gold;"></i>
                </button>
            @endfor
        </div>

        <div class="me-3">
            <select name="orderBy" id="sort" class="form w-auto fs10 me-1" onchange="submitForm()">
                <option value="lastest" {{ request('orderBy') == 'lastest' ? 'selected' : '' }}>Mới nhất</option>
                <option value="oldest" {{ request('orderBy') == 'oldest' ? 'selected' : '' }}>Cũ nhất</option>
            </select>
        </div>

        {{-- <button type="submit" class="btn btn-success align-self-end">Lọc</button> --}}
    </form>
    <div class="mb-4 mt-4">
        <hr>
    </div>
    <div class="reviews-section mt-4">
        @foreach ($reviews as $review)
            @if ($review->is_active)
                <div class="card mb-3">
                    <div class="card-body">
                        <img src="{{ '.' . Storage::url($review->user->image) }}" alt="User Image" height="60"
                            width="60" class="rounded-circle shadow-sm me-3">
                        <h5 class="card-title">{{ $review->user->name }}</h5>
                        <p class="card-text">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fa{{ $i <= $review->star ? '-solid' : '-regular' }} fa-star"
                                    style="color: {{ $i <= $review->star ? 'gold' : 'gray' }};"></i>
                            @endfor
                        </p>
                        <p class="card-text">{{ $review->content }}</p>
                        <p class="card-text"><small
                                class="text-muted">{{ $review->created_at->format('H:i - d/m/Y') }}</small></p>
                    </div>
                </div>
            @endif
        @endforeach

        <!-- phân trang -->
        <div class="mt-3 mb-5">
            {{ $reviews->links() }}
        </div>
    </div>
</div>
@section('script')
    <script>
        function submitForm() {
            document.getElementById('form_filter').submit();
        }
    </script>
@endsection
