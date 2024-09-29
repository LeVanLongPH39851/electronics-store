@include('clients.components.breadcrumb')
<!-- Cart Main Area Start -->
<div class="cart-main-area ptb-45">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <!-- Form Start -->
                <form action="#">
                    <!-- Table Content Start -->
                    <div class="table-content table-responsive mb-45">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Hình Ảnh</th>
                                    <th class="product-name">Sản Phẩm</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-subtotal">Tổng Tiền</th>
                                    <th class="product-remove">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="#"><img src="templates/img/products/13.jpg"
                                                alt="cart-image" /></a>
                                    </td>
                                    <td class="product-name"><a href="#">dictum idrisus</a></td>
                                    <td class="product-price"><span class="amount">£165.00</span></td>
                                    <td class="product-quantity">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <button class="btn btn-secondary" type="button">-</button>
                                            <input type="number" value="1" class="quantity-prd mx-2"/>
                                            <button class="btn btn-secondary" type="button">+</button>
                                        </div>
                                    </td>
                                    <td class="product-subtotal">£165.00</td>
                                    <td class="product-remove "> <a href="{{ route('client.cart') }}"><i
                                                class="fa fa-times text-danger" aria-hidden="true"></i></a></td>
                                </tr>
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="#"><img src="templates/img/products/23.jpg"
                                                alt="cart-image" /></a>
                                    </td>
                                    <td class="product-name"><a href="#">Carte Postal Clock</a></td>
                                    <td class="product-price"><span class="amount">£50.00</span></td>
                                    <td class="product-quantity">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <button class="btn btn-secondary" type="button">-</button>
                                            <input type="number" value="1" class="quantity-prd mx-2"/>
                                            <button class="btn btn-secondary" type="button">+</button>
                                        </div>
                                    </td>
                                    <td class="product-subtotal">£50.00</td>
                                    <td class="product-remove "> <a href="{{ route('client.cart') }}"><i
                                                class="fa fa-times text-danger" aria-hidden="true"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Table Content Start -->
                    <div class="row">
                        <!-- Cart Button Start -->
                        <div class="col-md-8 col-sm-12">
                            <div class="buttons-cart">
                                <input type="submit" value="Cập nhật giỏ hàng" />
                                <a href="{{ route('client.index') }}">Tiếp tục mua sắm</a>
                            </div>
                        </div>
                        <!-- Cart Button Start -->
                        <!-- Cart Totals Start -->
                        <div class="col-md-4 col-sm-12">
                            <div class="cart_totals float-md-right text-md-right">
                                <h2>Tổng Giỏ Hàng</h2>
                                <br />
                                <table class="float-md-right">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th class="text-start">Tạm Tính</th>
                                            <td class="text-end"><span class="amount">$215.00</span></td>
                                        </tr>
                                        <tr class="order-total">
                                            <th class="text-start">Tổng Tiền</th>
                                            <td class="text-end">
                                                <strong><span class="amount">$215.00</span></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="wc-proceed-to-checkout">
                                    <a href="{{ route('client.checkout') }}">Tiến Hành Thanh Toán</a>
                                </div>
                            </div>
                        </div>
                        <!-- Cart Totals End -->

                        <div>
                            <h3>Sản phẩm tương tự</h3>
                        </div>
                    </div>
                    <!-- Row End -->
                </form>
                <!-- Form End -->
            </div>
        </div>
        <!-- Row End -->
    </div>
</div>
<!-- Cart Main Area End -->
