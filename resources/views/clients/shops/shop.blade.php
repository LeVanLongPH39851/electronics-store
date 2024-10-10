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
                        
                        <div class="category-menu sidebar-menu sidbar-style">
                            <ul>
                                @foreach ($listDanhMuc as $danhMuc)
                                    <li class="has-sub">
                                        <a href="{{route('client.shop')}}?category={{$danhMuc->id}}">{{$danhMuc->name}}</a>
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
                <form action="{{route('client.shop')}}" id="sort" method="get">
                <div class="grid-list-top border-default universal-padding d-md-flex justify-content-md-between align-items-center mb-30">
                    {{-- <div class="grid-list-view">
                        <select name="" id="">
                            <option value="">12 product</option>
                        </select>
                    </div> --}}
                        <div class="d-flex">
                            <input type="text" name="search" value="{{request('search')}}" class="form-control me-2" placeholder="Tìm kiếm sản phẩm">
                            <button class="btn btn-success"><i class="fa fa-search"></i></button>
                        </div>
                        <!-- Toolbar Short Area Start -->
                        <div class="main-toolbar-sorter clearfix">
                            <div class="toolbar-sorter d-md-flex align-items-center">
                                <label>Lọc:</label>
                                <select class="sorter wide" name="sort" onchange="submit()">
                                    <option value="0">Lọc sản phẩm</option>
                                    <option {{request('sort') === 'nameAZ' ? "selected" : ""}} value="nameAZ">Theo tên từ A đến Z</option>
                                    <option {{request('sort') === "nameZA" ? "selected" : ""}} value="nameZA">Theo tên từ Z đến A</option>
                                    <option {{request('sort') === "priceAsc" ? "selected" : ""}} value="priceAsc">Giá thấp đến cao</option>
                                    <option {{request('sort') === "priceDesc" ? "selected" : ""}} value="priceDesc">Giá cao đến thấp</option>
                                </select>
                                <script>
                                    function submit(){
                                        document.getElementById('sort').submit();
                                    }
                                </script>
                            </div>
                        </div>
                    <!-- Toolbar Short Area End -->
                </div>
                </form>
                <!-- Grid & List View End -->
                <div class="main-categorie mb-all-40">
                    <!-- Grid & List Main Area End -->
                    <div class="tab-content border-default fix">
                        <div id="grid-view" class="tab-pane show fade active">
                            <div class="row">
                                @forelse ($listProduct as $key => $value)                 
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="{{route('client.product.detail', $value->id)}}">
                                                <img class="primary-img" src="{{asset('storage/' . $value->image) }}" alt="single-product">
                                                <img class="secondary-img" src="{{asset('storage/' . $value->galleries->first()->path) }}" alt="single-product">
                                            </a>
                                            {{-- <span class="sticker-new">new</span> --}}
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
                                                    <span class="price" style="font-size: 16px">{{number_format($value->productVariants->min('price'), 0, '', '.')}}đ - {{number_format($value->productVariants->max('price'), 0, '', '.')}}đ</span
                                                    >
                                                </p>
                                            </div>
                                            <div class="pro-actions">
                                                <div class="actions-primary">
                                                  <a
                                                    href="cart.html"
                                                    class="px-1"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    title="Xem chi tiết"
                                                    >Xem chi tiết</a
                                                  >
                                                </div>
                                                <div class="actions-secondary">
                                                  <a
                                                    href="product.html"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    title="Yêu thích"
                                                    ><i class="fa fa-heart-o"></i
                                                  ></a>
                                                </div>
                                              </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                </div>
                                <!-- Single Product End -->
                                @empty
                                <p class="text-danger">Không có sản phẩm nào</p>
                                @endforelse
                            </div>
                            <!-- Row End -->
                        </div>
                        {{ $listProduct->appends(request()->query())->links('pagination::bootstrap-5') }}
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