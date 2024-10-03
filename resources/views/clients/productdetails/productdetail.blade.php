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
                         <div id="thumb{{$product->id}}" class="tab-pane fade show active d-flex align-items-center aspect-ratio">
                             <a data-fancybox="images" id="link-image-main" href="{{".".Storage::url($product->image)}}"><img
                                     id="image-main" src="{{".".Storage::url($product->image)}}" alt="product-view"></a>
                         </div>
                         @foreach ($product->galleries as $gallery)
                         <div id="thumbgl{{$gallery->id}}" class="tab-pane fade d-flex align-items-center aspect-ratio">
                            <a data-fancybox="images" href="{{".".Storage::url($gallery->path)}}"><img
                                    src="{{".".Storage::url($gallery->path)}}" alt="product-view"></a>
                        </div>
                         @endforeach
                     </div>
                     <!-- Thumbnail Large Image End -->
                     <!-- Thumbnail Image End -->
                     <div class="product-thumbnail">
                         <div class="thumb-menu owl-carousel nav tabs-area" role="tablist">
                             <a class="active d-flex align-items-center aspect-ratio" data-bs-toggle="tab" href="#thumb{{$product->id}}"><img
                                     src="{{".".Storage::url($product->image)}}" alt="product-thumbnail"></a>
                            @foreach ($product->galleries as $gallery)
                             <a data-bs-toggle="tab" class="d-flex align-items-center aspect-ratio" href="#thumbgl{{$gallery->id}}"><img src="{{".".Storage::url($gallery->path)}}"
                                     alt="product-thumbnail"></a>
                            @endforeach
                         </div>
                     </div>
                     <!-- Thumbnail image end -->
                 </div>
                <!-- Main Thumbnail Image End -->
                <!-- Thumbnail Description Start -->
                <div class="col-lg-7">
                   <form action="">
                       <div class="thubnail-desc fix">
                           <h3 class="product-header mb-1 mt-3">{{$product->name}}</h3>
                           <div class="rating-summary fix mtb-10">
                               <div class="rating">
                                   <i class="fa fa-star"></i>
                                   <i class="fa fa-star"></i>
                                   <i class="fa fa-star-o"></i>
                                   <i class="fa fa-star-o"></i>
                                   <i class="fa fa-star-o"></i>
                               </div>
                               <div class="rating-feedback">
                                   <a href="#" class="mt-1">(1 review)</a>
                                   {{-- <a href="#">add to your review</a> --}}
                               </div>
                           </div>
                           <div class="pro-price mtb-10">
                               <p class="d-flex align-items-center"><span
                                       class="price" id="price">{{number_format($product->product_variants_min_price, 0, '', '.')}} vnđ - {{number_format($product->product_variants_max_price, 0, '', '.')}} vnđ</span><span id="sale"></span></p>
                           </div>
                           <p class="mb-20 pro-desc-details">{!!$product->short_description!!}</p>
                           <div class="product-size mb-20 clearfix">
                               <label class="mb-2 mt-4">Dung lượng</label>
                                   <div class="product-options">
                                       @foreach ($product->productVariants->unique('ssd_id') as $productVariant)
                                       <div class="form-check ps-0">
                                           <input class="form-check-input form-check-input1" type="radio" name="ssd" id="ssd{{$productVariant->ssd->id}}"
                                               value="{{$productVariant->ssd->id}}">
                                           <label class="form-check-label ms-0 me-2 text-nowrap" for="ssd{{$productVariant->ssd->id}}">{{$productVariant->ssd->name}}</label>
                                       </div>
                                       @endforeach
                                   </div>
                           </div>
                           <div class="color clearfix mb-20">
                               <label class="mb-2">Màu Sắc</label>
                                   <div class="product-options">
                                       @foreach ($product->productVariants->unique('color_id') as $productVariant)
                                       <div class="form-check ps-0">
                                           <input class="form-check-input form-check-input2" type="radio" name="color"
                                               id="color{{$productVariant->color->id}}" value="{{$productVariant->color->id}}">
                                           <label class="form-check-label ms-0 me-2 text-nowrap" for="color{{$productVariant->color->id}}">{{$productVariant->color->name}}</label>
                                       </div>
                                       @endforeach
                                   </div>
                           </div>
                           <div class="box-quantity d-flex my-4">
                               <label class="me-3">Số Lượng</label>
                                   <input class="quantity mr-40" type="number" min="1" value="1">
                               <a class="add-cart" href="cart.html">Thêm vào giỏ hàng</a>
                           </div>
                           <div class="pro-ref mt-15">
                               <label><b>Số lượng có sẵn:</b> <span id="result-quantity">{{$product->product_variants_sum_quantity}}</span></label>
                           </div>
                       </div>
                   </form>
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
                </ul>
                <!-- Product Thumbnail Tab Content Start -->
                <div class="tab-content thumb-content border-default">
                    <div id="dtail" class="tab-pane fade show active">
                        <p>{!!$product->description!!}</p>
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
                    <a href="{{ route('client.product.detail', 1) }}">
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
            <!-- Single Product End -->
        </div>
        <!-- New Pro Tow Activation End -->
    </div>
    <!-- Container End -->
</div>
<!-- Realated Products End Here -->
@section('script')
<script>
    // Lấy tất cả radio buttons
    const radioButtons = document.querySelectorAll('.form-check-input1');

    // Lặp qua từng radio button và lắng nghe sự kiện click
    radioButtons.forEach(radio => {
        radio.addEventListener('click', function () {
            // Bỏ chọn tất cả radio button khác
            radioButtons.forEach(rb => {
                if (rb !== this) {
                    rb.checked = false; // Bỏ chọn
                    rb.nextElementSibling.style.backgroundColor = ""; // Đặt lại màu nền
                    rb.nextElementSibling.style.color = ""; // Đặt lại màu chữ
                    rb.nextElementSibling.style.borderColor = ""; // Đặt lại màu viền
                }
            });

            // Cập nhật màu sắc cho nhãn tương ứng với radio button đã chọn
            this.nextElementSibling.style.backgroundColor = "#22c55e"; // Màu nền khi chọn
            this.nextElementSibling.style.color = "white"; // Màu chữ khi chọn
            this.nextElementSibling.style.borderColor = "#22c55e"; // Màu viền khi chọn
        });
    });
    //-------------- phần màu sắc
    const radioButtonsColor = document.querySelectorAll('.form-check-input2');

// Lặp qua từng radio button và lắng nghe sự kiện click
radioButtonsColor.forEach(radio => {
radio.addEventListener('click', function () {
    // Bỏ chọn tất cả radio button khác
    radioButtonsColor.forEach(rb => {
        if (rb !== this) {
            rb.checked = false; // Bỏ chọn
            rb.nextElementSibling.style.backgroundColor = ""; // Đặt lại màu nền
            rb.nextElementSibling.style.color = ""; // Đặt lại màu chữ
            rb.nextElementSibling.style.borderColor = ""; // Đặt lại màu viền
        }
    });

    // Cập nhật màu sắc cho nhãn tương ứng với radio button đã chọn
    this.nextElementSibling.style.backgroundColor = "#22c55e"; // Màu nền khi chọn
    this.nextElementSibling.style.color = "white"; // Màu chữ khi chọn
    this.nextElementSibling.style.borderColor = "#22c55e"; // Màu viền khi chọn
});
});
</script>
<script>
    // Hàm kiểm tra nếu cả hai checkbox đều được chọn
    function checkBothSelected() {
        const ssdsChecked = document.querySelectorAll('.form-check-input1:checked').length > 0; // Kiểm tra nếu có ít nhất một color được chọn
        const colorsChecked = document.querySelectorAll('.form-check-input2:checked').length > 0; // Kiểm tra nếu có ít nhất một ssd được chọn
        const ssdValue = document.querySelector('.form-check-input1:checked')
        const colorValue = document.querySelector('.form-check-input2:checked')
        const productVariants = <?php echo json_encode($product->productVariants); ?>;
        const resultQuantity = document.getElementById('result-quantity');
        const linkImageMain = document.getElementById('link-image-main');
        const imageMain = document.getElementById('image-main');
        const price = document.getElementById('price');
        const sale = document.getElementById('sale');
        if (colorsChecked && ssdsChecked) {
            productVariants.forEach(variant => {
            if(ssdValue.value == variant.ssd_id && colorValue.value == variant.color_id){
                resultQuantity.textContent = variant.quantity;
                linkImageMain.href = "./storage/" + variant.image;
                imageMain.src = "./storage/" + variant.image;
                price.innerHTML = '<del class="prev-price me-3">' + variant.listed_price.toLocaleString('de-DE') + ' vnđ</del>' + variant.price.toLocaleString('de-DE') + ' vnđ';
                var number = ((variant.listed_price - variant.price) / variant.listed_price) * 100;
                var saleResult = (number % 1 >= 0.5) ? Math.ceil(number) : Math.floor(number);
                sale.innerHTML = '<span class="saving-price">- ' + saleResult + '%</span>';
            } 
            });
        }
    }
    
    // Lắng nghe sự kiện change trên tất cả checkbox
    const ssdCheckboxes = document.querySelectorAll('.form-check-input1');
    const colorCheckboxes = document.querySelectorAll('.form-check-input2');

    ssdCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', checkBothSelected);
    });

    colorCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', checkBothSelected);
    });
</script>
@endsection