@include('clients.components.breadcrumb')
<div class="main-shop-page ptb-45">
    <div class="container">
        <h2 class="mb-4 text-center">Sản phẩm đã xem gần đây</h2>
        <div class="main-categorie mb-all-40">
            <div class="tab-content border-default fix">
                <div class="d-flex mb-3">
                    <form action="{{ route('recently.viewed') }}" method="GET" class="d-flex">
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control me-1"
                            placeholder="Tìm kiếm">
                        <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div id="grid-view" class="tab-pane show fade active">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-4">
                        @forelse ($products as $product)
                            <div class="col">
                                <div class="card h-100">
                                    <a href="{{ route('client.product.detail', $product->product->id) }}"
                                        class="pro-img">
                                        <img src="{{ asset('storage/' . $product->product->image) }}"
                                            class="card-img-top img-fluid" alt="{{ $product->product->name }}">
                                    </a>
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title text-center">
                                            <a href="{{ route('client.product.detail', $product->product->id) }}"
                                                class="text-dark">{{ $product->product->name }}</a>
                                        </h5>
                                        <div class="text-center mb-3">
                                            @php
                                                $averageRating = $product->product->reviews_avg_star ?? 0;
                                                $fullStars = floor($averageRating);
                                                $halfStar = $averageRating - $fullStars;
                                            @endphp
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $fullStars)
                                                    <i class="fa-solid fa-star" style="color: gold;"></i>
                                                @elseif ($i == $fullStars + 1 && $halfStar >= 0.5)
                                                    <i class="fa-solid fa-star-half-alt" style="color: gold;"></i>
                                                @else
                                                    <i class="fa-regular fa-star" style="color: gray;"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <p class="text-center price" style="font-size: 13px;">
                                            <strong>{{ number_format($product->product->productVariants->min('price'), 0, '', '.') }}đ
                                                -
                                                {{ number_format($product->product->productVariants->max('price'), 0, '', '.') }}đ</strong>
                                        </p>
                                        <div class="mt-3 text-center d-flex justify-content-center align-items-center">
                                            <form action="{{ route('recently.viewed.delete', $product->product->id) }}"
                                                method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-danger btn-sm d-flex align-items-center">
                                                    <i class="fa fa-trash me-1"></i> Xóa
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-danger text-center">Không có sản phẩm nào đã xem gần đây.</p>
                        @endforelse
                    </div>
                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
