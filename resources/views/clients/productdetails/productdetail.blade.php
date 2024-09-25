 @include('clients.components.breadcrumb')
 <!-- Product Thumbnail Start -->
 <div class="main-product-thumbnail ptb-45">
     <div class="container">
         <div class="thumb-bg">
             <div class="row">
                 <!-- Main Thumbnail Image Start -->
                 <div class="col-lg-5 mb-all-40">
                     <!-- Thumbnail Large Image start -->
                     <div class="tab-content">
                         <div id="thumb1" class="tab-pane fade show active">
                             <a data-fancybox="images" href="templates/img/products/35.jpg"><img
                                     src="templates/img/products/35.jpg" alt="product-view"></a>
                         </div>
                         <div id="thumb2" class="tab-pane fade">
                             <a data-fancybox="images" href="templates/img/products/13.jpg"><img
                                     src="templates/img/products/13.jpg" alt="product-view"></a>
                         </div>
                         <div id="thumb3" class="tab-pane fade">
                             <a data-fancybox="images" href="templates/img/products/15.jpg"><img
                                     src="templates/img/products/15.jpg" alt="product-view"></a>
                         </div>
                         <div id="thumb4" class="tab-pane fade">
                             <a data-fancybox="images" href="templates/img/products/4.jpg"><img
                                     src="templates/img/products/4.jpg" alt="product-view"></a>
                         </div>
                         <div id="thumb5" class="tab-pane fade">
                             <a data-fancybox="images" href="templates/img/products/5.jpg"><img
                                     src="templates/img/products/5.jpg" alt="product-view"></a>
                         </div>
                     </div>
                     <!-- Thumbnail Large Image End -->
                     <!-- Thumbnail Image End -->
                     <div class="product-thumbnail">
                         <div class="thumb-menu owl-carousel nav tabs-area" role="tablist">
                             <a class="active" data-bs-toggle="tab" href="#thumb1"><img
                                     src="templates/img/products/35.jpg" alt="product-thumbnail"></a>
                             <a data-bs-toggle="tab" href="#thumb2"><img src="templates/img/products/13.jpg"
                                     alt="product-thumbnail"></a>
                             <a data-bs-toggle="tab" href="#thumb3"><img src="templates/img/products/15.jpg"
                                     alt="product-thumbnail"></a>
                             <a data-bs-toggle="tab" href="#thumb4"><img src="templates/img/products/4.jpg"
                                     alt="product-thumbnail"></a>
                             <a data-bs-toggle="tab" href="#thumb5"><img src="templates/img/products/5.jpg"
                                     alt="product-thumbnail"></a>
                         </div>
                     </div>
                     <!-- Thumbnail image end -->
                 </div>
                 <!-- Main Thumbnail Image End -->
                 <!-- Thumbnail Description Start -->
                 <div class="col-lg-7">
                     <div class="thubnail-desc fix">
                         <h3 class="product-header">Faded Short Sleeves T-shirt</h3>
                         <div class="rating-summary fix mtb-10">
                             <div class="rating">
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star-o"></i>
                                 <i class="fa fa-star-o"></i>
                                 <i class="fa fa-star-o"></i>
                             </div>
                             <div class="rating-feedback">
                                 <a href="#">(1 review)</a>
                                 {{-- <a href="#">add to your review</a> --}}
                             </div>
                         </div>
                         <div class="pro-price mtb-30">
                             <p class="d-flex align-items-center"><span class="prev-price">16.51</span><span
                                     class="price">$15.19</span><span class="saving-price">save 8%</span></p>
                         </div>
                         <p class="mb-20 pro-desc-details">Faded short sleeves t-shirt with high neckline. Soft and
                             stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for
                             summer!</p>
                         <div class="product-size mb-20 clearfix">
                             <label>Dung lượng</label>
                             <form action="#">
                                 <div class="product-options">
                                     <div class="form-check">
                                         {{-- id truyền vào phải trùng với for ở llabel, value truyền vào từ database --}}
                                         <input class="form-check-input" type="radio" name="sizeram" id="size64"
                                             value="64">
                                         <label class="form-check-label" for="size64">64GB</label>
                                     </div>
                                     <div class="form-check">
                                         <input class="form-check-input" type="radio" name="sizeram" id="size128"
                                             value="128">
                                         <label class="form-check-label" for="size128">128GB</label>
                                     </div>
                                     <div class="form-check">
                                         <input class="form-check-input" type="radio" name="sizeram" id="size256"
                                             value="256">
                                         <label class="form-check-label" for="size256">256GB</label>
                                     </div>
                                 </div>
                             </form>
                         </div>
                         <div class="color clearfix mb-20">
                             <label>Màu Sắc</label>
                             <form action="#">
                                 <div class="product-options">
                                     <div class="form-check">
                                         {{-- id truyền vào phải trùng với for ở llabel, value truyền vào từ database --}}
                                         <input class="form-check-input" type="radio" name="colorname"
                                             id="vang" value="vang">
                                         <label class="form-check-label" for="vang">Vàng</label>
                                     </div>
                                     <div class="form-check">
                                         <input class="form-check-input" type="radio" name="colorname"
                                             id="titan" value="titan">
                                         <label class="form-check-label" for="titan">Titan</label>
                                     </div>
                                     <div class="form-check">
                                         <input class="form-check-input" type="radio" name="colorname"
                                             id="den" value="den">
                                         <label class="form-check-label" for="den">Đen</label>
                                     </div>
                                 </div>
                             </form>
                         </div>
                         <div class="box-quantity d-flex">
                             <label class="me-3">Số Lượng</label>
                             <form action="#">
                                 <input class="quantity mr-40" type="number" min="1" value="1">
                             </form>
                             <a class="add-cart" href="cart.html">add to cart</a>
                         </div>
                         <div class="pro-ref mt-15">
                             <label><b>Số lượng có sẵn: 20</b></label>
                         </div>
                         {{-- <div class="socila-sharing mt-25">
                            <ul class="d-flex">
                                <li>share</li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus-official" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                        <div class="product-policy mt-20">
                           <p><i class="fa fa-check-square-o" aria-hidden="true"></i>Security policy (edit with Customer reassurance module)
                           <p><i class="fa fa-truck" aria-hidden="true"></i>Delivery policy (edit with Customer reassurance module)
                           <p><i class="fa fa-exchange" aria-hidden="true"></i>Return policy (edit with Customer reassurance module)
                        </div> --}}
                     </div>
                 </div>
                 <!-- Thumbnail Description End -->
             </div>
             <!-- Row End -->
         </div>
     </div>
     <!-- Container End -->
 </div>
 <!-- Product Thumbnail End -->
 <!-- Product Thumbnail Description Start -->
 <div class="thumnail-desc pb-45">
     <div class="container">
         <div class="row">
             <div class="col-sm-12">
                 <ul class="main-thumb-desc nav tabs-area" role="tablist">
                     <li><a class="active" data-bs-toggle="tab" href="#dtail">Mô tả sản phẩm</a></li>
                     <li><a data-bs-toggle="tab" href="#review">Đánh giá (1)</a></li> {{-- 1 là số lượt đánh giá(lấy từ DB) --}}
                 </ul>
                 <!-- Product Thumbnail Tab Content Start -->
                 <div class="tab-content thumb-content border-default">
                     <div id="dtail" class="tab-pane fade show active">
                         <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine
                             designs delivering stylish separates and statement dresses which have since evolved into a
                             full ready-to-wear collection in which every item is a vital part of a woman's wardrobe.
                             The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style.
                             All the beautiful pieces are made in Italy and manufactured with the greatest attention.
                             Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
                     </div>
                     <div id="review" class="tab-pane fade">
                         <!-- Reviews Start -->
                         <div class="review border-default universal-padding">
                             <div class="group-title">
                                 <h2>Đánh giá sản phẩm</h2>
                             </div>
                         </div>
                         <!-- Reviews End -->
                         <!-- Reviews Start -->
                         <div class="review border-default universal-padding mt-30">
                             <p class="review-mini-title">đánh giá của bạn</p>
                             <ul class="review-list">
                                 <!-- Single Review List Start -->
                                 <li>
                                     {{-- <span>Sao</span> --}}
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star-o"></i>
                                 </li>
                                 <!-- Single Review List End -->
                             </ul>
                             <!-- Reviews Field Start -->
                             <div class="riview-field mt-40">
                                 <form autocomplete="off" action="#">
                                     {{-- <div class="form-group">
                                         <label class="req" for="sure-name">Nickname</label>
                                         <input type="text" class="form-control" id="sure-name"
                                             required="required">
                                     </div>
                                     <div class="form-group">
                                         <label class="req" for="subject">Summary</label>
                                         <input type="text" class="form-control" id="subject"
                                             required="required">
                                     </div> --}}
                                     <div class="form-group">
                                         <label class="req" for="comments">Nhận xét</label>
                                         <textarea class="form-control" rows="5" id="comments" required="required"></textarea>
                                     </div>
                                     <button type="submit" class="customer-btn">Gửi đánh giá</button>
                                 </form>
                             </div>
                             <!-- Reviews Field Start -->
                         </div>
                         <!-- Reviews End -->
                     </div>
                 </div>
                 <!-- Product Thumbnail Tab Content End -->
             </div>
         </div>
         <!-- Row End -->
     </div>
     <!-- Container End -->
 </div>
 <!-- Product Thumbnail Description End -->
 <!-- Realted Products Start Here -->
 <div class="second-featured-products related-pro pb-45">
     <div class="container">
         <!-- Post Title Start -->
         <div class="post-title">
             <h2><i class="fa fa-trophy" aria-hidden="true"></i>Realted products</h2>
         </div>
         <!-- Post Title End -->
         <!-- New Pro Tow Activation Start -->
         <div class="featured-pro-active owl-carousel">
             <!-- Single Product Start -->
             <div class="single-product">
                 <!-- Product Image Start -->
                 <div class="pro-img">
                     <a href="{{ route('client.product.detail') }}">
                         <img class="primary-img" src="templates/img/products/9.jpg" alt="single-product">
                         <img class="secondary-img" src="templates/img/products/10.jpg" alt="single-product">
                     </a>
                     <span class="sticker-new">new</span>
                 </div>
                 <!-- Product Image End -->
                 <!-- Product Content Start -->
                 <div class="pro-content">
                     <div class="pro-info">
                         <h4><a href="product.html">printed summer dress</a></h4>
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
                             <a href="cart.html" title="Add to Cart">Add To Cart</a>
                         </div>
                         <div class="actions-secondary">
                             <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                 title="Quick View"><i class="fa fa-heart-o"></i></a>
                             {{-- <a href="{{ route('client.product.detail') }}" title="Details"><i
                                     class="fa fa-signal"></i></a> --}}
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
                         <img class="primary-img" src="templates/img/products/14.jpg" alt="single-product">
                         <img class="secondary-img" src="templates/img/products/15.jpg" alt="single-product">
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
                             <i class="fa fa-star-o"></i>
                         </div>
                         <p><span class="price">$22.12</span></p>
                     </div>
                     <div class="pro-actions">
                         <div class="actions-primary">
                             <a href="cart.html" title="Add to Cart">Add To Cart</a>
                         </div>
                         <div class="actions-secondary">
                             <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                 title="Quick View"><i class="fa fa-heart-o"></i></a>
                             {{-- <a href="product.html" title="Details"><i class="fa fa-signal"></i></a> --}}
                         </div>
                     </div>
                 </div>
                 <!-- Product Content End -->
             </div>
             <!-- Single Product End -->
             <!-- Single Product Start -->
             {{-- <div class="single-product">
                 <!-- Product Image Start -->
                 <div class="pro-img">
                     <a href="product.html">
                         <img class="primary-img" src="templates/img/products/4.jpg" alt="single-product">
                         <img class="secondary-img" src="templates/img/products/6.jpg" alt="single-product">
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
                             <i class="fa fa-star-o"></i>
                             <i class="fa fa-star-o"></i>
                         </div>
                         <p><span class="price">$25.45</span><del class="prev-price">$27.12</del></p>
                     </div>
                     <div class="pro-actions">
                         <div class="actions-primary">
                             <a href="cart.html" title="Add to Cart">Add To Cart</a>
                         </div>
                         <div class="actions-secondary">
                             <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                 title="Quick View"><i class="fa fa-heart-o"></i></a>
                             <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                         </div>
                     </div>
                 </div>
                 <!-- Product Content End -->
             </div> --}}
             <!-- Single Product End -->
             <!-- Single Product Start -->
             {{-- <div class="single-product">
                 <!-- Product Image Start -->
                 <div class="pro-img">
                     <a href="product.html">
                         <img class="primary-img" src="templates/img/products/34.jpg" alt="single-product">
                         <img class="secondary-img" src="templates/img/products/32.jpg" alt="single-product">
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
                         <p><span class="price">$22.45</span><del class="prev-price">$25.20</del></p>
                     </div>
                     <div class="pro-actions">
                         <div class="actions-primary">
                             <a href="cart.html" title="Add to Cart">Add To Cart</a>
                         </div>
                         <div class="actions-secondary">
                             <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                 title="Quick View"><i class="fa fa-heart-o"></i></a>
                             <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                         </div>
                     </div>
                 </div>
                 <!-- Product Content End -->
             </div> --}}
             <!-- Single Product End -->
             <!-- Single Product Start -->
             {{-- <div class="single-product">
                 <!-- Product Image Start -->
                 <div class="pro-img">
                     <a href="product.html">
                         <img class="primary-img" src="templates/img/products/8.jpg" alt="single-product">
                         <img class="secondary-img" src="templates/img/products/9.jpg" alt="single-product">
                     </a>
                     <span class="sticker-new">new</span>
                 </div>
                 <!-- Product Image End -->
                 <!-- Product Content Start -->
                 <div class="pro-content">
                     <div class="pro-info">
                         <h4><a href="product.html">winter hot dress</a></h4>
                         <div class="product-rating">
                             <i class="fa fa-star"></i>
                             <i class="fa fa-star"></i>
                             <i class="fa fa-star"></i>
                             <i class="fa fa-star"></i>
                             <i class="fa fa-star"></i>
                         </div>
                         <p><span class="price">$30.45</span></p>
                     </div>
                     <div class="pro-actions">
                         <div class="actions-primary">
                             <a href="cart.html" title="Add to Cart">Add To Cart</a>
                         </div>
                         <div class="actions-secondary">
                             <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                 title="Quick View"><i class="fa fa-heart-o"></i></a>
                             <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                         </div>
                     </div>
                 </div>
                 <!-- Product Content End -->
             </div> --}}
             <!-- Single Product End -->
             <!-- Single Product Start -->
             {{-- <div class="single-product">
                 <!-- Product Image Start -->
                 <div class="pro-img">
                     <a href="product.html">
                         <img class="primary-img" src="templates/img/products/9.jpg" alt="single-product">
                         <img class="secondary-img" src="templates/img/products/10.jpg" alt="single-product">
                     </a>
                     <span class="sticker-new">new</span>
                 </div>
                 <!-- Product Image End -->
                 <!-- Product Content Start -->
                 <div class="pro-content">
                     <div class="pro-info">
                         <h4><a href="product.html">printed small dress</a></h4>
                         <div class="product-rating">
                             <i class="fa fa-star"></i>
                             <i class="fa fa-star"></i>
                             <i class="fa fa-star"></i>
                             <i class="fa fa-star"></i>
                             <i class="fa fa-star"></i>
                         </div>
                         <p><span class="price">$27.45</span><del class="prev-price">$30.50</del></p>
                     </div>
                     <div class="pro-actions">
                         <div class="actions-primary">
                             <a href="cart.html" title="Add to Cart">Add To Cart</a>
                         </div>
                         <div class="actions-secondary">
                             <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                 title="Quick View"><i class="fa fa-heart-o"></i></a>
                             <a href="{{ route('client.product.detail') }}" title="Details"><i class="fa fa-signal"></i></a>
                         </div>
                     </div>
                 </div>
                 <!-- Product Content End -->
             </div> --}}
             <!-- Single Product End -->
         </div>
         <!-- New Pro Tow Activation End -->
     </div>
     <!-- Container End -->
 </div>
 <!-- Realated Products End Here -->
