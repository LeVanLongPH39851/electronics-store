<!-- Categorie Menu & Slider Area Start Here -->
<div class="main-page-banner ptb-30">
    <div class="container">
        <div class="row">
            <!-- Vertical Menu Start Here -->
            <div class="col-xl-3 col-lg-4 d-none d-lg-block">
                <div class="vertical-menu mb-all-30">
                    <span class="categorie-title">Danh Mục <i class="fa fa-angle-down"></i></span>
                    <nav>
                        <ul class="vertical-menu-list">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('client.shop') }}"><span><img
                                                src="templates/img/vertical-menu/1.png"
                                                alt="menu-icon" /></span>{{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Vertical Menu End Here -->
            <!-- Slider Area Start Here -->
            <div class="col-xl-6 col-lg-8">
                <div class="slider-wrapper theme-default">
                    <!-- Slider Background  Image Start-->
                    <div id="slider" class="nivoSlider">
                        @foreach ($slideShow->slideShowGalleries as $slideShowGallery)
                            <a
                                href="{{ $slideShowGallery->link ? route('client.product.detail', $slideShowGallery->link) : '' }}"><img
                                    src="{{ '.' . Storage::url($slideShowGallery->image) }}"
                                    data-thumb="{{ '.' . Storage::url($slideShowGallery->image) }}"
                                    alt="slide" /></a>
                        @endforeach
                    </div>
                    <!-- Slider Background  Image Start-->
                    <div class="slider-progress"></div>
                </div>
            </div>
            <!-- Brand Banner End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Brand Banner Area End Here -->
    <!-- Hot Deal Products Start Here -->
    <div class="hot-deal-products pb-45">
        <div class="container">
            <!-- Post Title Start -->
            <div class="post-title">
                <h2>Sản phẩm mới</h2>
            </div>
            <!-- Post Title End -->
            <div class="row">
                <!-- Hot Deal Left Banner Start -->
                <div class="col-xl-3 col-lg-4 col-md-5">
                    <div class="single-banner">
                        <a href="shop.html"><img src="templates/img/banner/4.jpg" alt="" /></a>
                    </div>
                </div>
                <!-- Hot Deal Left Banner End -->
                <!-- Hot Deal Product Activation Start -->
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <div class="main-hot-deal">
                        <!-- Hot Deal Product Active Start -->
                        <div class="hot-deal-active owl-carousel">
                            <!-- Single Product Start -->
                            @foreach ($newProducts as $newProduct)
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img w-100 d-flex align-items-center" style="aspect-ratio: 1/1">
                                        <a href="{{ route('client.product.detail', $newProduct->id) }}">
                                            <img class="primary-img" src="{{ '.' . Storage::url($newProduct->image) }}"
                                                alt="single-product" />
                                            <img class="secondary-img"
                                                src="{{ '.' . Storage::url($newProduct->galleries->first()->path) }}"
                                                alt="single-product" />
                                        </a>
                                        {{-- <div class="countdown bg-main text-white" data-countdown="2024/12/01"></div> --}}
                                    </div>
                                    @if ($newProduct->isFavorited())
                                        <span class="heart-icon"
                                            style="position: absolute; top: 1px; left: 200px; color: red;">
                                            <i class="fa fa-heart"></i>
                                        </span>
                                    @endif
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="product.html">{{ $newProduct->name }}</a></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p>
                                                <span class="price"
                                                    style="font-size: 14px">{{ number_format($newProduct->product_variants_min_price, 0, '', '.') }}đ
                                                    -
                                                    {{ number_format($newProduct->product_variants_max_price, 0, '', '.') }}đ</span>
                                            </p>
                                        </div>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="{{ route('client.product.detail', $newProduct->id) }}"
                                                    class="px-1" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Xem chi tiết">Xem chi tiết</a>
                                            </div>
                                            @if (!$newProduct->isFavorited())
                                                        <div class="actions-secondary">
                                                            <form
                                                                action="{{ route('client.wishlist.add', $newProduct->id) }}"
                                                                method="POST" style="display: inline;">
                                                                @csrf
                                                                <button type="submit" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="Yêu thích"
                                                                    style="border: none; background: coral; cursor: pointer; height: 36px; border-radius: 2px;">
                                                                    <i class="fa fa-heart"
                                                                        style="font-size: 20px;"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    @endif
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                    {{-- <span class="sticker-new">mới</span> --}}
                                    {{-- <span class="sticker-sale">-5%</span> --}}
                                </div>
                            @endforeach
                            <!-- Single Product End -->
                        </div>
                        <!-- Hot Deal Product Active End -->
                    </div>
                </div>
                <!-- Hot Deal Product Activation End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Container End -->
</div>
<!-- Categorie Menu & Slider Area End Here -->
<!-- Brand Banner Area Start Here -->
<div class="main-brand-banner pb-30">
    <div class="container">
      <!-- Brand Banner Start -->
      <div class="brand-banner owl-carousel">
        <div class="single-brand">
          <a href="#"
            ><img class="img" src="templates/img/brand/1.jpg" alt="brand-image"
          /></a>
        </div>
        <div class="single-brand">
          <a href="#"><img src="templates/img/brand/2.jpg" alt="brand-image" /></a>
        </div>
        <div class="single-brand">
          <a href="#"><img src="templates/img/brand/3.jpg" alt="brand-image" /></a>
        </div>
        <div class="single-brand">
          <a href="#"><img src="templates/img/brand/4.jpg" alt="brand-image" /></a>
        </div>
        <div class="single-brand">
          <a href="#"><img src="templates/img/brand/5.jpg" alt="brand-image" /></a>
        </div>
        <div class="single-brand">
          <a href="#"><img src="templates/img/brand/6.jpg" alt="brand-image" /></a>
        </div>
        <div class="single-brand">
          <a href="#"><img src="templates/img/brand/7.jpg" alt="brand-image" /></a>
        </div>
      </div>
      <!-- Brand Banner End -->
    </div>
    <!-- Container End -->
  </div>
  <!-- Brand Banner Area End Here -->
  <div class="hot-deal-products pb-45">
    <div class="container">
      <!-- Post Title Start -->
      <div class="post-title">
        <h2>Sản phẩm mới</h2>
      </div>
      <!-- Post Title End -->
      <div class="row">
        <!-- Hot Deal Left Banner Start -->
        <div class="col-xl-3 col-lg-4 col-md-5">
          <div class="single-banner">
            <a href="shop.html"><img src="templates/img/banner/4.jpg" alt="" /></a>
          </div>
        </div>
        <!-- Hot Deal Left Banner End -->
        <!-- Hot Deal Product Activation Start -->
        <div class="col-xl-9 col-lg-8 col-md-7">
          <div class="main-hot-deal">
            <!-- Hot Deal Product Active Start -->
            <div class="hot-deal-active owl-carousel">
              <!-- Single Product Start -->
              @foreach ($newProducts as $newProduct)
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img w-100 d-flex align-items-center" style="aspect-ratio: 1/1">
                  <a href="{{route('client.product.detail', $newProduct->id)}}">
                    <img
                      class="primary-img"
                      src="{{".".Storage::url($newProduct->image)}}"
                      alt="single-product"
                    />
                    {{-- <img class="secondary-img" src="{{ ".".Storage::url($newProduct->galleries->first()->path()) }}" alt="single-product" /> --}}
                  </a>
                    <div class="countdown bg-main text-white" data-countdown="2024/12/01"></div>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content"><div class="pro-info">
                    <h4><a href="product.html">{{ $newProduct->name }}</a></h4>
                    <div class="product-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <p>
                        <span class="price" style="font-size: 14px">{{ number_format($newProduct->product_variants_min_price, 0, '', '.') }}đ - {{ number_format($newProduct->product_variants_max_price, 0, '', '.') }}đ</span>
                    </p>
                </div>
                <div class="pro-actions">
                    <div class="actions-primary">
                        <a
                            href="{{ route('client.product.detail', $newProduct->id) }}"
                            class="px-1 mx-2"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Xem chi tiết"
                        >Xem chi tiết</a>
                    </div>
                   
                    <div class="actions-secondary">
                        <form action="{{ route('client.wishlist.add', $newProduct->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" data-bs-toggle="tooltip" class="whish-btn" data-bs-placement="top" title="Yêu thích">
                                <i class="fa fa-heart-o" style="font-size: 20px;"></i>
                            </button>
                        </form>
                    </div>
                </div>

                </div>
                <!-- Product Content End -->
                {{-- <span class="sticker-new">mới</span> --}}
                {{-- <span class="sticker-sale">-5%</span> --}}
              </div>
              @endforeach
              <!-- Single Product End -->
        <!-- Brand Banner Start -->
        <div class="brand-banner owl-carousel">
            <div class="single-brand">
                <a href="#"><img class="img" src="templates/img/brand/1.jpg" alt="brand-image" /></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="templates/img/brand/2.jpg" alt="brand-image" /></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="templates/img/brand/3.jpg" alt="brand-image" /></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="templates/img/brand/4.jpg" alt="brand-image" /></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="templates/img/brand/5.jpg" alt="brand-image" /></a>
            </div>
            <div class="single-brand">
                <a href="#"><img src="templates/img/brand/6.jpg" alt="brand-image" /></a>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Big Banner End Here -->
    <!-- Electronics Products Area Start Here -->
    <div class="electronics-product pb-45">
        <div class="container">
            <div class="row">
                <!-- Electronics Banner Start -->
                <div class="col-xl-3 col-lg-4 col-md-5">
                    <!-- Post Title Start -->
                    <div class="post-title">
                        <h2>
                            <i class="ion-ios-game-controller-b-outline"></i>Sản phẩm nổi bật
                        </h2>
                    </div>
                    <!-- Post Title End -->
                    <div class="single-banner">
                        <a href="shop.html"><img src="templates/img/banner/6.jpg" alt="" /></a>
                    </div>
                </div>
                <!-- Electronics Banner End -->
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <div class="main-product-tab-area">
                        <!-- Nav tabs -->
                        <ul class="nav tabs-area" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#camera">Điện thoại</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#gamepad">Laptop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#d-camera">Tivi</a>
                            </li>
                        </ul>
                        <!-- Tab Contetn Start -->
                        <div class="tab-content">
                            <div id="camera" class="tab-pane fade show active">
                                <!-- Electronics Product Activation Start Here -->
                                <div class="electronics-pro-active owl-carousel">
                                    <!-- Double Product Start -->
                                    <div class="double-product">
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/8.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/7.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/11.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/12.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4><a href="product.html">iPhone 15</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">15.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Double Product End -->
                                    <!-- Double Product Start -->
                                    <div class="double-product">
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/13.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/11.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                                <span class="sticker-sale">-8%</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4><a href="product.html">iPhone 15</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/23.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/22.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Double Product End -->
                                    <!-- Double Product Start -->
                                    <div class="double-product">
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/15.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/14.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/29.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/30.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">15.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Double Product End -->
                                </div>
                                <!-- Electronics Product Activation End Here -->
                            </div>
                            <!-- #camera End Here -->
                            <div id="gamepad" class="tab-pane fade">
                                <!-- Electronics Product Activation Start Here -->
                                <div class="electronics-pro-active owl-carousel">
                                    <!-- Double Product Start -->
                                    <div class="double-product">
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/8.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/7.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/11.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/12.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4><a href="product.html">iPhone 15</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">15.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Double Product End -->
                                    <!-- Double Product Start -->
                                    <div class="double-product">
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/13.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/11.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                                <span class="sticker-sale">-8%</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4><a href="product.html">iPhone 15</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/23.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/22.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Double Product End -->
                                    <!-- Double Product Start -->
                                    <div class="double-product">
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/15.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/14.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/29.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/30.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">15.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Double Product End -->
                                </div>
                                <!-- Electronics Product Activation End Here -->
                            </div>
                            <!-- #gmaepad End Here -->
                            <div id="d-camera" class="tab-pane fade">
                                <!-- Electronics Product Activation Start Here -->
                                <div class="electronics-pro-active owl-carousel">
                                    <!-- Double Product Start -->
                                    <div class="double-product">
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/8.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/7.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/11.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/12.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4><a href="product.html">iPhone 15</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">15.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Double Product End -->
                                    <!-- Double Product Start -->
                                    <div class="double-product">
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/13.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/11.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                                <span class="sticker-sale">-8%</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4><a href="product.html">iPhone 15</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/23.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/22.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Double Product End -->
                                    <!-- Double Product Start -->
                                    <div class="double-product">
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/15.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/14.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/29.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/30.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">15.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Double Product End -->
                                </div>
                                <!-- Electronics Product Activation End Here -->
                            </div>
                            <!-- #d-camera End Here -->
                        </div>
                        <!-- Tab Content End -->
                    </div>
                    <!-- main-product-tab-area-->
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Electronics Products Area End Here -->
    <!-- Tv & Video Products Area Start Here -->
    <div class="second-electronics-product pb-45">
        <div class="container">
            <div class="row">
                <!-- Electronics Banner Start -->
                <div class="col-xl-3 col-lg-4 col-md-5">
                    <!-- Post Title Start -->
                    <div class="post-title">
                        <h2>
                            <i class="fa fa-television" aria-hidden="true"></i>Sản phẩm bán chạy
                        </h2>
                    </div>
                    <!-- Post Title End -->
                    <div class="single-banner">
                        <a href="shop.html"><img src="templates/img/banner/7.jpg" alt="" /></a>
                    </div>
                </div>
                <!-- Electronics Banner End -->
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <div class="main-product-tab-area">
                        <!-- Nav tabs -->
                        <ul class="nav tabs-area" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#camera1">Điện thoại</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#gamepad1">Laptop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#d-camera1">Tivi</a>
                            </li>
                        </ul>
                        <!-- Tab Contetn Start -->
                        <div class="tab-content">
                            <div id="camera1" class="tab-pane fade show active">
                                <!-- Electronics Product Activation Start Here -->
                                <div class="electronics-pro-active owl-carousel">
                                    <!-- Double Product Start -->
                                    <div class="double-product">
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/8.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/7.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/11.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/12.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4><a href="product.html">iPhone 15</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">15.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Double Product End -->
                                    <!-- Double Product Start -->
                                    <div class="double-product">
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/13.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/11.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                                <span class="sticker-sale">-8%</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4><a href="product.html">iPhone 15</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/23.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/22.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Double Product End -->
                                    <!-- Double Product Start -->
                                    <div class="double-product">
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/15.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/14.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/29.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/30.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">15.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Double Product End -->
                                </div>
                                <!-- Electronics Product Activation End Here -->
                            </div>
                            <!-- #camera End Here -->
                            <div id="gamepad1" class="tab-pane fade">
                                <!-- Electronics Product Activation Start Here -->
                                <div class="electronics-pro-active owl-carousel">
                                    <!-- Double Product Start -->
                                    <div class="double-product">
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/8.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/7.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/11.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/12.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4><a href="product.html">iPhone 15</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">15.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Double Product End -->
                                    <!-- Double Product Start -->
                                    <div class="double-product">
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/13.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/11.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                                <span class="sticker-sale">-8%</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4><a href="product.html">iPhone 15</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/23.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/22.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Double Product End -->
                                    <!-- Double Product Start -->
                                    <div class="double-product">
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/15.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/14.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/29.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/30.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">15.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Double Product End -->
                                </div>
                                <!-- Electronics Product Activation End Here -->
                            </div>
                            <!-- #gmaepad End Here -->
                            <div id="d-camera1" class="tab-pane fade">
                                <!-- Electronics Product Activation Start Here -->
                                <div class="electronics-pro-active owl-carousel">
                                    <!-- Double Product Start -->
                                    <div class="double-product">
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/8.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/7.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/11.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/12.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4><a href="product.html">iPhone 15</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">15.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Double Product End -->
                                    <!-- Double Product Start -->
                                    <div class="double-product">
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/13.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/11.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                                <span class="sticker-sale">-8%</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4><a href="product.html">iPhone 15</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/23.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/22.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Double Product End -->
                                    <!-- Double Product Start -->
                                    <div class="double-product">
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/15.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/14.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/29.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/30.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">15.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Double Product End -->
                                </div>
                                <!-- Electronics Product Activation End Here -->
                            </div>
                            <!-- #d-camera End Here -->
                        </div>
                        <!-- Tab Content End -->
                    </div>
                    <!-- main-product-tab-area-->
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Tv & Video Products Area End Here -->
    <!-- Fashion Products Area Start Here -->
    <div class="fashion pb-45">
        <div class="container">
            <div class="row">
                <!-- Electronics Banner Start -->
                <div class="col-xl-3 col-lg-4 col-md-5">
                    <!-- Post Title Start -->
                    <div class="post-title">
                        <h2>
                            <i class="ion-tshirt-outline" aria-hidden="true"></i>Sản phẩm chất lượng
                        </h2>
                    </div>
                    <!-- Post Title End -->
                    <div class="single-banner">
                        <a href="shop.html"><img src="templates/img/banner/10.jpg" alt="" /></a>
                    </div>
                </div>
                <!-- Electronics Banner End -->
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <div class="main-product-tab-area">
                        <!-- Nav tabs -->
                        <ul class="nav tabs-area" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#camera2">Điện thoại</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#gamepad2">Laptop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#d-camera2">Tivi</a>
                            </li>
                        </ul>
                        <!-- Tab Contetn Start -->
                        <div class="tab-content">
                            <div id="camera2" class="tab-pane fade show active">
                                <!-- Electronics Product Activation Start Here -->
                                <div class="electronics-pro-active owl-carousel">
                                    <!-- Double Product Start -->
                                    <div class="double-product">
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/8.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/7.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/11.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/12.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4><a href="product.html">iPhone 15</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">15.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Double Product End -->
                                    <!-- Double Product Start -->
                                    <div class="double-product">
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/13.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/11.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                                <span class="sticker-sale">-8%</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4><a href="product.html">iPhone 15</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/23.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/22.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Double Product End -->
                                    <!-- Double Product Start -->
                                    <div class="double-product">
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/15.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/14.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/29.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/30.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">15.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Double Product End -->
                                </div>
                                <!-- Electronics Product Activation End Here -->
                            </div>
                            <!-- #camera End Here -->
                            <div id="gamepad2" class="tab-pane fade">
                                <!-- Electronics Product Activation Start Here -->
                                <div class="electronics-pro-active owl-carousel">
                                    <!-- Double Product Start -->
                                    <div class="double-product">
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/8.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/7.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/11.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/12.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4><a href="product.html">iPhone 15</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">15.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Double Product End -->
                                    <!-- Double Product Start -->
                                    <div class="double-product">
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/13.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/11.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                                <span class="sticker-sale">-8%</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4><a href="product.html">iPhone 15</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/23.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/22.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Double Product End -->
                                    <!-- Double Product Start -->
                                    <div class="double-product">
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/15.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/14.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/29.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/30.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">15.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Double Product End -->
                                </div>
                                <!-- Electronics Product Activation End Here -->
                            </div>
                            <!-- #gmaepad End Here -->
                            <div id="d-camera2" class="tab-pane fade">
                                <!-- Electronics Product Activation Start Here -->
                                <div class="electronics-pro-active owl-carousel">
                                    <!-- Double Product Start -->
                                    <div class="double-product">
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/8.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/7.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/11.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/12.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4><a href="product.html">iPhone 15</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">15.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Double Product End -->
                                    <!-- Double Product Start -->
                                    <div class="double-product">
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/13.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/11.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                                <span class="sticker-sale">-8%</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4><a href="product.html">iPhone 15</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/23.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/22.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Double Product End -->
                                    <!-- Double Product Start -->
                                    <div class="double-product">
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/15.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/14.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">12.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="templates/img/products/29.jpg"
                                                        alt="single-product" />
                                                    <img class="secondary-img" src="templates/img/products/30.jpg"
                                                        alt="single-product" />
                                                </a>
                                                <span class="sticker-new">mới</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4>
                                                    <a href="product.html">iPhone 15</a>
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">15.000.000đ</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" class="px-1 w-auto"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Add to Cart">Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="product.html" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#myModal"><i
                                                                    class="fa fa-search"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Double Product End -->
                                </div>
                                <!-- Electronics Product Activation End Here -->
                            </div>
                            <!-- #d-camera End Here -->
                        </div>
                        <!-- Tab Content End -->
                    </div>
                    <!-- main-product-tab-area-->
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Fashion Products Area End Here -->
    <!-- Second Electronics Products Area Start Here -->

    <!-- Home & Kitchen Products Area End Here -->
    <!-- New & Featured Products Area Start Here -->
    <div class="new-featured-pro pb-45">
        <div class="container">
            <div class="row">
                <!-- New Products Area Start Here -->
                <div class="col-lg-6">
                    <!-- Main Product Wrpper Start Here -->
                    <div class="main-pro-wrapper">
                        <div class="new-products">
                            <!-- Post Title Start -->
                            <div class="post-title">
                                <h2>
                                    <i class="ion-ribbon-b" aria-hidden="true"></i>Điện thoại
                                </h2>
                            </div>
                            <!-- Post Title End -->
                            <div class="single-banner">
                                <a href="shop.html"><img src="templates/img/banner/11.jpg" alt="" /></a>
                            </div>
                        </div>

                        @foreach ($newProducts as $newProduct)
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="{{ route('client.product.detail', $newProduct->id) }}"
                                        onclick="event.preventDefault(); document.getElementById('add-viewed-{{ $newProduct->id }}').submit();">
                                        <img class="primary-img" src="{{ asset('storage/' . $newProduct->image) }}"
                                            alt="single-product">
                                        <img class="secondary-img"
                                            src="{{ asset('storage/' . $newProduct->galleries->first()->path) }}"
                                            alt="single-product">
                                    </a>

                                    <form id="add-viewed-{{ $newProduct->id }}"
                                        action="{{ route('client.product.addRecentlyViewed', $newProduct->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a
                                                href="{{ route('client.product.detail', $newProduct->id) }}">{{ $newProduct->name }}</a>
                                        </h4>
                                        <div class="product-rating">
                                            @for ($i = 0; $i < 5; $i++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                        </div>
                                        <p>
                                            <span class="price" style="font-size: 14px">
                                                {{ number_format($newProduct->product_variants_min_price, 0, '', '.') }}đ
                                                -
                                                {{ number_format($newProduct->product_variants_max_price, 0, '', '.') }}đ
                                            </span>
                                        </p>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" class="px-1 w-auto" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Add to Cart">Thêm giỏ hàng</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="product.html" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Favorite"><i
                                                    class="fa fa-heart-o"></i></a>
                                            <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#myModal"><i class="fa fa-search"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
                        @endforeach
                    </div>
                    <!-- Main Product Wrpper Start Here -->
                </div>
                <!-- New Products Area End Here -->
                <!-- Featured Products Area Start Here -->
                <div class="col-lg-6">
                    <!-- Main Product Wrpper Start Here -->
                    <div class="main-pro-wrapper">
                        <div class="featured-products">
                            <!-- Post Title Start -->
                            <div class="post-title">
                                <h2>
                                    <i class="ion-trophy" aria-hidden="true"></i>Laptop
                                </h2>
                            </div>
                            <!-- Post Title End -->
                            <div class="single-banner">
                                <a href="shop.html"><img src="templates/img/banner/12.jpg" alt="" /></a>
                            </div>
                        </div>
                        <!-- New Products Activation Start -->
                        <div class="new-products-active owl-carousel">
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="templates/img/products/9.jpg"
                                            alt="single-product" />
                                        <img class="secondary-img" src="templates/img/products/10.jpg"
                                            alt="single-product" />
                                    </a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="product.html">iPhone 15</a></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p>
                                            <span class="price">15.000.00đ</span><del
                                                class="prev-price">12.000.000đ</del>
                                        </p>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" class="px-1 w-auto" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Add to Cart">Thêm giỏ hàng</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="product.html" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Favorite"><i
                                                    class="fa fa-heart-o"></i></a>
                                            <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#myModal"><i class="fa fa-search"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">mới</span>
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="templates/img/products/9.jpg"
                                            alt="single-product" />
                                        <img class="secondary-img" src="templates/img/products/10.jpg"
                                            alt="single-product" />
                                    </a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="product.html">iPhone 15</a></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p>
                                            <span class="price">15.000.00đ</span><del
                                                class="prev-price">12.000.000đ</del>
                                        </p>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" class="px-1 w-auto" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Add to Cart">Thêm giỏ hàng</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="product.html" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Favorite"><i
                                                    class="fa fa-heart-o"></i></a>
                                            <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#myModal"><i class="fa fa-search"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">mới</span>
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="templates/img/products/9.jpg"
                                            alt="single-product" />
                                        <img class="secondary-img" src="templates/img/products/10.jpg"
                                            alt="single-product" />
                                    </a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="product.html">iPhone 15</a></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p>
                                            <span class="price">15.000.00đ</span><del
                                                class="prev-price">12.000.000đ</del>
                                        </p>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" class="px-1 w-auto" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Add to Cart">Thêm giỏ hàng</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="product.html" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Favorite"><i
                                                    class="fa fa-heart-o"></i></a>
                                            <span data-bs-toggle="tooltip" data-bs-placement="top">
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#myModal"><i class="fa fa-search"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">mới</span>
                            </div>
                            <!-- Single Product End -->
                        </div>
                        <!-- New Products Activation End -->
                    </div>
                    <!-- Main Product Wrpper Start Here -->
                </div>
                <!-- Featured Products Area End Here -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- New & Featured Products Area End Here -->
    <!-- Support Area Start Here -->
    <div class="support-area pb-45">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                <div class="col">
                    <div class="single-support d-flex align-items-center">
                        <div class="support-icon">
                            <i class="ion-android-time"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Thứ 2 - Thứ 7 / 8:00 - 18:00</h6>
                            <span>Ngày/Giờ Làm Việc</span>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single-support d-flex align-items-center">
                        <div class="support-icon">
                            <i class="ion-ios-telephone"></i>
                        </div>
                        <div class="support-desc">
                            <h6>888 345 6789</h6>
                            <span>Hỗ Trợ Miễn Phí!</span>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single-support d-flex align-items-center">
                        <div class="support-icon">
                            <i class="ion-help-buoy"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Support@example.com</h6>
                            <span>Hỗ Trợ Đặt Hàng!</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </div>
  </div>
  <!-- Support Area End Here -->
@section('modal')
    @include('clients.components.modalhome')
@endsection
