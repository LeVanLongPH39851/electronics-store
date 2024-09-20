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
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
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
                                        <div class="input-group" style="max-width: 120px; margin: 0 auto;">
                                            <!-- Nút giảm số lượng -->
                                            <button class="btn btn-outline-secondary me-2" type="button"
                                                id="button-minus"
                                                style="width: 30px; height: 30px; border-radius: 0; padding: 0; display: flex; align-items: center; justify-content: center;">
                                                <i class="fa fa-minus" aria-hidden="true" style="font-size: 16px;"></i>
                                            </button>

                                            <!-- Ô hiển thị số lượng, chỉ để đọc -->
                                            <input type="text" class="form-control text-center" value="1"
                                                readonly aria-label="Quantity"
                                                style="width: 30px; height: 30px; border-radius: 0; border: 1px solid #ced4da; padding: 0; font-size: 16px; display: flex; align-items: center; justify-content: center;">

                                            <!-- Nút tăng số lượng -->
                                            <button class="btn btn-outline-secondary ms-2" type="button"
                                                id="button-plus"
                                                style="width: 30px; height: 30px; border-radius: 0; padding: 0; display: flex; align-items: center; justify-content: center;">
                                                <i class="fa fa-plus" aria-hidden="true" style="font-size: 16px;"></i>
                                            </button>
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
                                        <div class="input-group" style="max-width: 120px; margin: 0 auto;">
                                            <!-- Nút giảm số lượng -->
                                            <button class="btn btn-outline-secondary me-2" type="button"
                                                id="button-minus"
                                                style="width: 30px; height: 30px; border-radius: 0; padding: 0; display: flex; align-items: center; justify-content: center;">
                                                <i class="fa fa-minus" aria-hidden="true" style="font-size: 16px;"></i>
                                            </button>

                                            <!-- Ô hiển thị số lượng, chỉ để đọc -->
                                            <input type="text" class="form-control text-center" value="1"
                                                readonly aria-label="Quantity"
                                                style="width: 30px; height: 30px; border-radius: 0; border: 1px solid #ced4da; padding: 0; font-size: 16px; display: flex; align-items: center; justify-content: center;">

                                            <!-- Nút tăng số lượng -->
                                            <button class="btn btn-outline-secondary ms-2" type="button"
                                                id="button-plus"
                                                style="width: 30px; height: 30px; border-radius: 0; padding: 0; display: flex; align-items: center; justify-content: center;">
                                                <i class="fa fa-plus" aria-hidden="true" style="font-size: 16px;"></i>
                                            </button>
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
                                <input type="submit" value="Update Cart" />
                                <a href="#">Continue Shopping</a>
                            </div>
                        </div>
                        <!-- Cart Button Start -->
                        <!-- Cart Totals Start -->
                        <div class="col-md-4 col-sm-12">
                            <div class="cart_totals float-md-right text-md-right">
                                <h2>Cart Totals</h2>
                                <br />
                                <table class="float-md-right">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td><span class="amount">$215.00</span></td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td>
                                                <strong><span class="amount">$215.00</span></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="wc-proceed-to-checkout">
                                    <a href="#">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                        <!-- Cart Totals End -->
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
