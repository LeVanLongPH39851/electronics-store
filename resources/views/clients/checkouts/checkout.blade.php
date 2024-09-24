@include('clients.components.breadcrumb')
<!-- coupon-area start -->
<div class="coupon-area pt-45">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="coupon-accordion">
                    <h3>Bạn có mã giảm giá không? <span id="showcoupon">Nhấp để nhập mã của bạn.</span></h3>
                    <div id="checkout_coupon" class="coupon-checkout-content">
                        <div class="coupon-info">
                            <form action="#">
                                <p class="checkout-coupon">
                                    <input type="text" class="code" placeholder="Mã Giảm Giá" />
                                    <input type="submit" value="Áp Dụng" />
                                </p>
                            </form>
                        </div>
                    </div>
                    <!-- ACCORDION END -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- coupon-area end -->
<!-- checkout-area start -->
<div class="checkout-area pb-45 pt-15">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="checkbox-form mb-sm-40">
                    <h3>Chi Tiết Thanh Toán</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="checkout-form-list mb-30">
                                <label>Họ Và Tên<span class="required">*</span></label>
                                <input type="text" placeholder="Họ và tên"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkout-form-list mb-30">
                                <label>Địa Chỉ <span class="required">*</span></label>
                                <input type="text" placeholder="Địa chỉ"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkout-form-list mb-30">
                                <label>Địa Chỉ Email <span class="required">*</span></label>
                                <input type="email" placeholder="Địa chỉ email"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkout-form-list mb-30">
                                <label>Số Điện Thoại <span class="required">*</span></label>
                                <input type="text" placeholder="Số điện thoại"/>
                            </div>
                        </div>
                    </div>
                    <div class="different-address">
                        <div class="order-notes">
                            <div class="checkout-form-list">
                                <label>Ghi Chú</label>
                                <textarea id="checkout-mess" cols="30" rows="10"
                                    placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ: ghi chú đặc biệt khi giao hàng."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="your-order">
                    <h3>Thông Tin Đơn Hàng</h3>
                    <div class="your-order-table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-name">Sản Phẩm</th>
                                    <th class="product-total">Tổng Tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="cart_item">
                                    <td class="product-name">
                                        Vestibulum suscipit <span class="product-quantity"> × 1</span>
                                    </td>
                                    <td class="product-total">
                                        <span class="amount">£165.00</span>
                                    </td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">
                                        Vestibulum dictum magna <span class="product-quantity"> × 1</span>
                                    </td>
                                    <td class="product-total">
                                        <span class="amount">£50.00</span>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Tạm tính</th>
                                    <td><span class="amount">£215.00</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Tổng đơn hàng</th>
                                    <td><span class=" total amount">£215.00</span>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment-method">
                        <div class="mb-3">
                            <h3>CHỌN PHƯƠNG THỨC THANH TOÁN:</h3>
                            
                            <div class="form-check border rounded p-3 mb-3 bg-white">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="paymentDirectBank" value="directBank" checked>
                                <label class="form-check-label" for="paymentDirectBank">
                                    Thanh toán trực tuyến
                                </label>
                                <div class="form-text">
                                    Thanh toán Online với thẻ ATM, MoMo, ZaloPay hoặc PayPal. Bạn sẽ được chuyển tới TechNova để tiến hành thanh toán.
                                </div>
                            </div>
                            
                            <div class="form-check border rounded p-3 mb-3 bg-white">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="paymentCheque" value="cheque">
                                <label class="form-check-label" for="paymentCheque">
                                    Thanh toán trực tiếp
                                </label>
                                <div class="form-text">
                                    Khách hàng thanh toán bằng tiền mặt khi nhận hàng.
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <button class="btn btn-success btn-lg">Thanh Toán</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- checkout-area end -->
