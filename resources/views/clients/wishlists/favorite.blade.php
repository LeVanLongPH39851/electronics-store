@include('clients.components.breadcrumb')

<!-- Wishlist Page Start -->
<div class="main-wishlist-page ptb-45">
    <div class="container">
        <!-- Row Start -->
        <div class="row">
            <div class="col-lg-12 order-1 order-lg-2">
                <h2 class="mb-4">Danh sách yêu thích của bạn</h2>

                <div class="row">
                    @forelse ($wishlists as $wishlistItem)
                        <!-- Single Product Start -->
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="{{ route('client.product.detail', $wishlistItem->product->id) }}">
                                        <img class="primary-img" src="{{ asset('storage/' . $wishlistItem->product->image) }}" alt="single-product">
                                    </a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="{{ route('client.product.detail', $wishlistItem->product->id) }}">{{ $wishlistItem->product->name }}</a></h4>
                                        <div class="product-rating">
                                            @for ($i = 0; $i < 5; $i++)
                                                <i class="fa fa-star{{ $i < $wishlistItem->product->rating ? '' : '-o' }}"></i>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('client.wishlist.remove', $wishlistItem->id) }}" method="POST" class="remove-wishlist-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger remove-btn" title="Xóa khỏi danh sách yêu thích">Xóa</button>
                                </form>
                                <!-- Product Content End -->
                            </div>
                        </div>
                        <!-- Single Product End -->
                    @empty
                        <div class="col-12">
                            <p class="text-danger">Không có sản phẩm yêu thích!</p>
                        </div>
                    @endforelse
                </div>
            </div>
            <!-- Product Categorie List End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Wishlist Page End -->

@section('modal')
    @include('clients.components.modalshop')
@endsection

<!-- Đảm bảo bạn đã bao gồm thư viện jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
