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
                        <h3 class="sidebar-title e-title">Electronics</h3>
                        <div id="shop-cate-toggle" class="category-menu sidebar-menu sidbar-style">
                            <ul>
                                <li class="has-sub"><a href="#">Camera</a>
                                    <ul class="category-sub">
                                        <li><a href="shop.html">Cords and Cables</a></li>
                                        <li><a href="shop.html">gps accessories</a></li>
                                        <li><a href="shop.html">Microphones</a></li>
                                        <li><a href="shop.html">Wireless Transmitters</a></li>
                                    </ul>
                                    <!-- category submenu end-->
                                </li>
                                <li class="has-sub"><a href="#">gamepad</a>
                                    <ul class="category-sub">
                                        <li><a href="shop.html">cube lifestyle hd</a></li>
                                        <li><a href="shop.html">gopro hero4</a></li>
                                        <li><a href="shop.html">bhandycam cx405ags</a></li>
                                        <li><a href="shop.html">vixia hf r600</a></li>
                                    </ul>
                                    <!-- category submenu end-->
                                </li>
                                <li class="has-sub"><a href="#">Digital Cameras</a>
                                    <ul class="category-sub">
                                        <li><a href="shop.html">Gold eye</a></li>
                                        <li><a href="shop.html">Questek</a></li>
                                        <li><a href="shop.html">Snm</a></li>
                                        <li><a href="shop.html">vantech</a></li>
                                    </ul>
                                    <!-- category submenu end-->
                                </li>
                                <li class="has-sub"><a href="#">Virtual Reality</a>
                                    <ul class="category-sub">
                                        <li><a href="shop.html">Samsung</a></li>
                                        <li><a href="shop.html">Toshiba</a></li>
                                        <li><a href="shop.html">Transcend</a></li>
                                        <li><a href="shop.html">Sandisk</a></li>
                                    </ul>
                                    <!-- category submenu end-->
                                </li>
                            </ul>
                        </div>
                        <!-- category-menu-end -->
                    </div>
                    <!-- Sidebar Electronics Categorie End -->
                    <!-- Price Filter Options Start -->
                    <div class="search-filter mb-30">
                        <h3 class="sidebar-title">filter by price</h3>
                        <form action="#" class="sidbar-style">
                            <div id="slider-range"></div>
                            <input type="text" id="amount" class="amount-range" readonly>
                        </form>
                    </div>
                    <!-- Price Filter Options End -->
                    <!-- Sidebar Categorie Start -->
                    <div class="sidebar-categorie mb-30">
                        <h3 class="sidebar-title">categories</h3>
                        <ul class="sidbar-style">
                            <li class="form-check">
                                <input class="form-check-input" value="#" id="camera" type="checkbox">
                                <label class="form-check-label" for="camera">Cameras (8)</label>
                            </li>
                            <li class="form-check">
                                <input class="form-check-input" value="#" id="GamePad" type="checkbox">
                                <label class="form-check-label" for="GamePad">GamePad (8)</label>
                            </li>
                            <li class="form-check">
                                <input class="form-check-input" value="#" id="Digital" type="checkbox">
                                <label class="form-check-label" for="Digital">Digital Cameras (8)</label>
                            </li>
                            <li class="form-check">
                                <input class="form-check-input" value="#" id="Virtual" type="checkbox">
                                <label class="form-check-label" for="Virtual"> Virtual Reality (8) </label>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar Categorie Start -->
                    <!-- Product Size Start -->
                    <div class="size mb-30">
                        <h3 class="sidebar-title">size</h3>
                        <ul class="size-list sidbar-style">
                            <li class="form-check">
                                <input class="form-check-input" value="" id="small" type="checkbox">
                                <label class="form-check-label" for="small">S (6)</label>
                            </li>
                            <li class="form-check">
                                <input class="form-check-input" value="" id="medium" type="checkbox">
                                <label class="form-check-label" for="medium">M (9)</label>
                            </li>
                            <li class="form-check">
                                <input class="form-check-input" value="" id="large" type="checkbox">
                                <label class="form-check-label" for="large">L (8)</label>
                            </li>
                        </ul>
                    </div>
                    <!-- Product Size End -->
                    <!-- Product Color Start -->
                    <div class="color mb-30">
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
                    </div>
                    <!-- Product Color End -->
                    <!-- Single Banner Start -->
                    <div class="sidebar-banner">
                        <a href="shop.html"><img src="templates/img/banner/10.jpg" alt="slider-banner"></a>
                    </div>
                    <!-- Single Banner End -->
                </div>
            </div>
            <!-- Sidebar Shopping Option End -->
            <!-- Product Categorie List Start -->
            <div class="col-lg-9 order-1 order-lg-2">
                <!-- Grid & List View Start -->
                <div class="grid-list-top border-default universal-padding d-md-flex justify-content-md-between align-items-center mb-30">
                    <div class="grid-list-view  mb-sm-15">
                        <ul class="nav tabs-area d-flex align-items-center">
                            <li><a data-bs-toggle="tab" href="#grid-view"><i class="fa fa-th"></i></a></li>
                            <li><a class="active" data-bs-toggle="tab" href="#list-view"><i class="fa fa-list-ul"></i></a></li>
                            <li><span class="grid-item-list">There are 8 products.</span></li>
                        </ul>
                    </div>
                    <!-- Toolbar Short Area Start -->
                    <div class="main-toolbar-sorter clearfix">
                        <div class="toolbar-sorter d-md-flex align-items-center">
                            <label>Sort By:</label>
                            <select class="sorter wide">
                                <option value="Position">Relevance</option>
                                <option value="Product Name">Neme, A to Z</option>
                                <option value="Product Name">Neme, Z to A</option>
                                <option value="Price">Price low to heigh</option>
                                <option value="Price">Price heigh to low</option>
                            </select>
                        </div>
                    </div>
                    <!-- Toolbar Short Area End -->
                </div>
                <!-- Grid & List View End -->
                <div class="main-categorie mb-all-40">
                    <!-- Grid & List Main Area End -->
                    <div class="tab-content border-default fix">
                        <div id="grid-view" class="tab-pane fade ">
                            <div class="row">
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="templates/img/products/35.jpg" alt="single-product">
                                                <img class="secondary-img" src="templates/img/products/14.jpg" alt="single-product">
                                            </a>
                                            <span class="sticker-new">new</span>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="pro-info">
                                                <h4><a href="product.html">summer dress</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">$27.45</span></p>
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
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="templates/img/products/14.jpg" alt="single-product">
                                                <img class="secondary-img" src="templates/img/products/11.jpg" alt="single-product">
                                            </a>
                                            <span class="sticker-new">new</span>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="pro-info">
                                                <h4><a href="product.html">hot summer dress</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">$22.45</span><del class="prev-price">$30.50</del></p>
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
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="templates/img/products/22.jpg" alt="single-product">
                                                <img class="secondary-img" src="templates/img/products/23.jpg" alt="single-product">
                                            </a>
                                            <span class="sticker-new">new</span>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="pro-info">
                                                <h4><a href="product.html">winter dress</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">$11.40</span><del class="prev-price">$20.50</del></p>
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
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="templates/img/products/25.jpg" alt="single-product">
                                                <img class="secondary-img" src="templates/img/products/26.jpg" alt="single-product">
                                            </a>
                                            <span class="sticker-new">new</span>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="pro-info">
                                                <h4><a href="product.html">summer dress</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">$33.45</span><del class="prev-price">$40.25</del></p>
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
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="templates/img/products/30.jpg" alt="single-product">
                                                <img class="secondary-img" src="templates/img/products/31.jpg" alt="single-product">
                                            </a>
                                            <span class="sticker-new">new</span>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="pro-info">
                                                <h4><a href="product.html">wnter miami dress</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">$22.18</span><del class="prev-price">$30.20</del></p>
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
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="templates/img/products/32.jpg" alt="single-product">
                                                <img class="secondary-img" src="templates/img/products/16.jpg" alt="single-product">
                                            </a>
                                            <span class="sticker-new">new</span>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="pro-info">
                                                <h4><a href="product.html">printed dress</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">$27.45</span></p>
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
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="templates/img/products/18.jpg" alt="single-product">
                                                <img class="secondary-img" src="templates/img/products/19.jpg" alt="single-product">
                                            </a>
                                            <span class="sticker-new">new</span>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="pro-info">
                                                <h4><a href="product.html">printed hot dress</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">$55.15</span><del class="prev-price">$60.20</del></p>
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
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="templates/img/products/22.jpg" alt="single-product">
                                                <img class="secondary-img" src="templates/img/products/21.jpg" alt="single-product">
                                            </a>
                                            <span class="sticker-new">new</span>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="pro-info">
                                                <h4><a href="product.html">cultural dress</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">$21.12</span></p>
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
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="templates/img/products/6.jpg" alt="single-product">
                                                <img class="secondary-img" src="templates/img/products/5.jpg" alt="single-product">
                                            </a>
                                            <span class="sticker-new">new</span>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="pro-info">
                                                <h4><a href="product.html">printed dress</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">$31.99</span></p>
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
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="templates/img/products/7.jpg" alt="single-product">
                                                <img class="secondary-img" src="templates/img/products/8.jpg" alt="single-product">
                                            </a>
                                            <span class="sticker-new">new</span>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="pro-info">
                                                <h4><a href="product.html">full sleeves shirt</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">$21.00</span><del class="prev-price">$25.00</del></p>
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
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="templates/img/products/11.jpg" alt="single-product">
                                                <img class="secondary-img" src="templates/img/products/12.jpg" alt="single-product">
                                            </a>
                                            <span class="sticker-new">new</span>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="pro-info">
                                                <h4><a href="product.html">new arrival dress</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">$20.45</span><del class="prev-price">$30.10</del></p>
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
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="templates/img/products/4.jpg" alt="single-product">
                                                <img class="secondary-img" src="templates/img/products/5.jpg" alt="single-product">
                                            </a>
                                            <span class="sticker-new">new</span>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="pro-info">
                                                <h4><a href="product.html">summer dress</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">$27.45</span></p>
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
                            </div>
                            <!-- Row End -->
                        </div>
                        <!-- #grid view End -->
                        <div id="list-view" class="tab-pane fade show active">
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
                        </div>
                        <!-- #list view End -->
                        <!-- Product Pagination Info -->
                        <div class="product-pagination mb-20 pb-15">
                            <span class="grid-item-list">Showing 1-8 of 8 item(s)</span>
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