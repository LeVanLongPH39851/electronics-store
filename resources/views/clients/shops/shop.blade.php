@include('clients.components.breadcrumb')
<!-- Shop Page Start -->
<div class="main-shop-page ptb-45">
    <div class="container">
        <!-- Row End -->
        <div class="row">
            <!-- Sidebar Shopping Option Start -->
            <div class="col-lg-3 order-2 order-lg-1">
                <div class="sidebar">
                    <!-- Sidebar Electronics Categorie Start -->
                    <div class="electronics mb-30">
                        <h3 class="sidebar-title e-title">Danh Mục</h3>
                        
                        <div id="shop-cate-toggle" class="category-menu sidebar-menu sidbar-style">
                            <ul>
                                @foreach ($listDanhMuc as $danhMuc)
                                    <li class="has-sub">
                                        <a href="#" onclick="filterByCategory({{ $danhMuc->id }})">{{$danhMuc->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        
                        <!-- category-menu-end -->
                    </div>
                    <!-- Sidebar Electronics Categorie End -->
                    <!-- Price Filter Options Start -->
                    <div class="search-filter mb-30">   
                        <h3 class="sidebar-title">Lọc theo giá</h3>
                        <form method="get" action="{{route('client.shop')}}">
                            <div class="price_slider_wrapper">
                             <div style="display: flex; margin-bottom: 10px; align-items: center"><input type="radio" value="1-5" {{$price == '1-5' ? 'checked' : ''}} name="price_filter" style="margin-right: 5px" id="">  Dưới 5 Triệu</div>
                             <div style="display: flex; margin-bottom: 10px; align-items: center"><input type="radio" value="5-10" {{ $price == '5-10' ? 'checked' : ''}} name="price_filter" style="margin-right: 5px" id=""> 5 Triệu - 10 Triệu</div>
                             <div style="display: flex; margin-bottom: 10px; align-items: center"><input type="radio" value="10-20" {{$price == '10-20' ? 'checked' : ''}} name="price_filter" style="margin-right: 5px" id=""> 10 Triệu - 20 Triệu</div>
                             <div style="display: flex; margin-bottom: 10px; align-items: center"><input type="radio" value="20-30" {{$price == '20-30' ? 'checked' : ''}} name="price_filter" style="margin-right: 5px" id=""> 20 Triệu - 30 Triệu</div>
                             <div style="display: flex; margin-bottom: 10px; align-items: center"><input type="radio" value="30-40" {{$price == '30-40' ? 'checked' : ''}} name="price_filter" style="margin-right: 5px" id=""> 30 Triệu - 40 Triệu</div>
                             <div style="display: flex; margin-bottom: 10px; align-items: center"><input type="radio" value="40-50" {{$price == '40-50' ? 'checked' : ''}} name="price_filter" style="margin-right: 5px" id=""> 40 Triệu - 50 Triệu</div>
                             <div style="display: flex; margin-bottom: 10px; align-items: center"><input type="radio" value=">50" {{$price == '>50' ? 'checked' : ''}} name="price_filter" style="margin-right: 5px" id=""> Trên 50 Triệu</div>
                             <div class="price_slider_amount" style="display: flex; justify-content: start">
                                <button type="submit" class="btn btn-success">Filter</button>
                            </div>
                            </div>
                        </form>
                    </div>
                    <!-- Price Filter Options End -->
                    <!-- Sidebar Categorie Start -->
                    <div class="sidebar-categorie mb-30">
                        <h3 class="sidebar-title">Màu</h3>
                        <ul class="sidbar-style">
                            @foreach ($listColor as $color)                         
                            <li class="form-check">
                                <input class="form-check-input" value="#" id="camera" type="checkbox">
                                <label class="form-check-label" for="camera">{{$color->name}}</label>
                            </li>
                            @endforeach
                           
                        </ul>
                    </div>
                    <!-- Sidebar Categorie Start -->
                    <!-- Product Size Start -->
                    <div class="size mb-30">
                        <h3 class="sidebar-title">Ram</h3>
                        <ul class="size-list sidbar-style">
                            @foreach($listSsd as $ram)
                            <li class="form-check">
                                <input class="form-check-input" value="" id="small" type="checkbox">
                                <label class="form-check-label" for="small">{{$ram->name}}</label>
                            </li>
                           @endforeach
                            
                        </ul>
                    </div>
                    <!-- Product Size End -->
                    <!-- Product Color Start -->
                    {{-- <div class="color mb-30">
                        <h3 class="sidebar-title">color</h3>
                        <ul class="color-option sidbar-style">
                            <li>
                                <span class="white"></span>
                                <a href="#">white (4)</a>
                            </li>
                            <li>
                                <span class="orange"></span>
                                <a href="#">Orange (2)</a>
                            </li>
                            <li>
                                <span class="blue"></span>
                                <a href="#">Blue (6)</a>
                            </li>
                            <li>
                                <span class="yellow"></span>
                                <a href="#">Yellow (8)</a>
                            </li>
                        </ul>
                    </div> --}}
                    <!-- Product Color End -->
                    <!-- Single Banner Start -->
                    {{-- <div class="sidebar-banner">
                        <a href="shop.html"><img src="templates/img/banner/10.jpg" alt="slider-banner"></a>
                    </div> --}}
                    <!-- Single Banner End -->
                </div>
            </div>
            <!-- Sidebar Shopping Option End -->
            <!-- Product Categorie List Start -->
            <div class="col-lg-9 order-1 order-lg-2">
                <!-- Grid & List View Start -->
                <div class="grid-list-top border-default universal-padding d-md-flex justify-content-md-between align-items-center mb-30">
                    {{-- <div class="grid-list-view">
                        <select name="" id="">
                            <option value="">12 product</option>
                        </select>
                    </div> --}}
                    <div class="d-flex ">
                        <input type="text" class="form-control me-2" placeholder="Tìm kiếm sản phẩm">
                        <button class="btn btn-success"><i class="fa fa-search"></i></button>
                    </div>
                    <!-- Toolbar Short Area Start -->
                    <div class="main-toolbar-sorter clearfix">
                        <div class="toolbar-sorter d-md-flex align-items-center">
                            <label>Lọc:</label>
                            <select class="sorter wide">
                                <option value="Position">Lọc sản phẩm</option>
                                <option value="Product Name">Theo tên từ A đến Z</option>
                                <option value="Product Name">Theo tên từ Z đến A</option>
                                <option value="Price">Giá thấp đến cao</option>
                                <option value="Price">Giá cao đến thấp</option>
                            </select>
                        </div>
                    </div>
                    <!-- Toolbar Short Area End -->
                </div>
                <!-- Grid & List View End -->
                <div class="main-categorie mb-all-40">
                    <!-- Grid & List Main Area End -->
                    <div class="tab-content border-default fix">
                        <div id="grid-view" class="tab-pane show fade active">
                            <div class="row">
                                @foreach ($listProduct as $key => $value)                 
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="{{route('client.product.detail', $value->id)}}">
                                                <img class="primary-img" src="{{asset('storage/' . $value->image) }}" alt="single-product">
                                                <img class="secondary-img" src="templates/img/products/14.jpg" alt="single-product">
                                            </a>
                                            <span class="sticker-new">new</span>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="pro-info">
                                                <h4><a href="product.html">{{ $value->name }}</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p>
                                                    <span class="price">{{ number_format($value->product_variants_min_price, 0, '', '.').' VNĐ'}}</span
                                                    ><del class="prev-price">{{number_format($value->product_variants_max_price, 0, '', '.').' VNĐ'}}</del>
                                                </p>

                                            </div>
                                            <div class="pro-actions">
                                                <div class="actions-primary">
                                                    <a href="cart.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart">Add To Cart</a>
                                                </div>
                                                <div class="actions-secondary">
                                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-heart-o"></i></a>

                                                    </span>
                                                    <a href="product.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Details"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                </div>
                                <!-- Single Product End -->
                                @endforeach
                               
                               
                            </div>
                            <!-- Row End -->
                        </div>
                        <!-- #grid view End -->
                        {{-- -------------------------------------------------------------- 2 khoi --------------------------------- --}}
                        {{-- <div id="list-view" class="tab-pane fade show active">
                            <!-- Single Product Start -->
                            <div class="row single-product">
                                <!-- Product Image Start -->
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-5 col-4">
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="templates/img/products/35.jpg" alt="single-product">
                                            <img class="secondary-img" src="templates/img/products/7.jpg" alt="single-product">
                                        </a>
                                        <span class="sticker-new">new</span>
                                        <span class="sticker-sale">-8%</span>
                                    </div>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="col-xl-9 col-lg-8 col-md-8 col-sm-7 col-8">
                                    <div class="pro-content">
                                        <h4><a href="product.html">Faded Short Sleeves T-shirt</a></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p><span class="price">$15.19</span><del class="prev-price">$16.50</del></p>
                                        <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!</p>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="cart.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart">Add To Cart</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-heart-o"></i></a>

                                                </span>
                                                <a href="product.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Details"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="row single-product">
                                <!-- Product Image Start -->
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-5 col-4">
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="templates/img/products/14.jpg" alt="single-product">
                                            <img class="secondary-img" src="templates/img/products/15.jpg" alt="single-product">
                                        </a>
                                        <span class="sticker-new">new</span>
                                        <span class="sticker-sale">-8%</span>
                                    </div>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="col-xl-9 col-lg-8 col-md-8 col-sm-7 col-8">
                                    <div class="pro-content">
                                        <h4><a href="product.html">Printed Summer Dress</a></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <p><span class="price">$22.00</span></p>
                                        <p>Sleeveless knee-length chiffon dress. V-neckline with elastic under the bust lining.</p>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="cart.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart">Add To Cart</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-heart-o"></i></a>

                                                </span>
                                                <a href="product.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Details"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="row single-product">
                                <!-- Product Image Start -->
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-5 col-4">
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="templates/img/products/12.jpg" alt="single-product">
                                            <img class="secondary-img" src="templates/img/products/11.jpg" alt="single-product">
                                        </a>
                                        <span class="sticker-new">new</span>
                                        <span class="sticker-sale">-8%</span>
                                    </div>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="col-xl-9 col-lg-8 col-md-8 col-sm-7 col-8">
                                    <div class="pro-content">
                                        <h4><a href="product.html">Printed Hot Dress</a></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p><span class="price">$35.00</span><del class="prev-price">$46.50</del></p>
                                        <p>Sleeveless knee-length chiffon dress. V-neckline with elastic under the bust lining.</p>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="cart.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart">Add To Cart</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-heart-o"></i></a>

                                                </span>
                                                <a href="product.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Details"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="row single-product">
                                <!-- Product Image Start -->
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-5 col-4">
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="templates/img/products/13.jpg" alt="single-product">
                                            <img class="secondary-img" src="templates/img/products/14.jpg" alt="single-product">
                                        </a>
                                        <span class="sticker-new">new</span>
                                        <span class="sticker-sale">-8%</span>
                                    </div>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="col-xl-9 col-lg-8 col-md-8 col-sm-7 col-4">
                                    <div class="pro-content">
                                        <h4><a href="product.html">Short Sleeves T-shirt</a></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <p><span class="price">$32.99</span></p>
                                        <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!</p>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="cart.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart">Add To Cart</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-heart-o"></i></a>

                                                </span>
                                                <a href="product.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Details"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="row single-product">
                                <!-- Product Image Start -->
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-5 col-4">
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="templates/img/products/11.jpg" alt="single-product">
                                            <img class="secondary-img" src="templates/img/products/7.jpg" alt="single-product">
                                        </a>
                                        <span class="sticker-new">new</span>
                                        <span class="sticker-sale">-8%</span>
                                    </div>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="col-xl-9 col-lg-8 col-md-8 col-sm-7 col-8">
                                    <div class="pro-content">
                                        <h4><a href="product.html">Printed Winter Dress</a></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p><span class="price">$33.10</span><del class="prev-price">$35.50</del></p>
                                        <p>short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!</p>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="cart.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart">Add To Cart</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-heart-o"></i></a>

                                                </span>
                                                <a href="product.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Details"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="row single-product">
                                <!-- Product Image Start -->
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-5 col-4">
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="templates/img/products/8.jpg" alt="single-product">
                                            <img class="secondary-img" src="templates/img/products/7.jpg" alt="single-product">
                                        </a>
                                        <span class="sticker-new">new</span>
                                        <span class="sticker-sale">-8%</span>
                                    </div>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="col-xl-9 col-lg-8 col-md-8 col-sm-7 col-8">
                                    <div class="pro-content">
                                        <h4><a href="product.html">Faded Short Sleeves T-shirt</a></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <p><span class="price">$25.45</span><del class="prev-price">$26.50</del></p>
                                        <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!</p>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="cart.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart">Add To Cart</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-heart-o"></i></a>

                                                </span>
                                                <a href="product.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Details"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
                            <!-- Single Product End -->
                        </div> --}}
                        <!-- #list view End -->
                        <!-- Product Pagination Info -->
                        <div class="product-pagination mb-20 pb-15">
                            <span class="grid-item-list">Showing 1-9 of 9 item(s)</span>
                        </div>
                        <ul class="blog-pagination ptb-20">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                        <!-- End of .blog-pagination -->
                    </div>
                    <!-- Grid & List Main Area End -->
                </div>
            </div>
            <!-- product Categorie List End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Shop Page End -->
@section('modal')
@include('clients.components.modalshop')
@endsection

<!-- Đảm bảo bạn đã bao gồm thư viện jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
   function filterByCategory(categoryId) {
        $.ajax({
            type: 'GET',
            url: '{{ route("client.shop") }}',
            data: {
                category_filter: categoryId
            },
            success: function(data) {
                // Xử lý dữ liệu sản phẩm đã lọc từ máy chủ
                console.log(data);
                // Hiển thị dữ liệu sản phẩm đã lọc lên trang web của bạn
            },
            error: function(err) {
                console.error(err);
            }
        });
    }
</script>