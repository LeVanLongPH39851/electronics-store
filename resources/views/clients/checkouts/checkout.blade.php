@include('clients.components.breadcrumb')
<!-- coupon-area start -->
<div class="coupon-area pt-45">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="coupon-accordion">
                    <!-- ACCORDION START -->
                    <h3>Bạn có mã giảm giá không? <span id="showcoupon">Nhấp vào để nhập mã.</span></h3>
                    <div id="checkout_coupon" class="coupon-checkout-content">
                        <div class="coupon-info">
                            <form action="#">
                                <p class="checkout-coupon">
                                    <input type="text" class="code" placeholder="Mã giảm giá" />
                                    <input type="submit" value="Áp dụng" /> 
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
                    <h3>Chi tiết thanh toán</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="checkout-form-list mb-30">
                                <label>Họ và tên <span class="required">*</span></label>
                                <input type="text" placeholder="Họ và tên" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkout-form-list mb-30">
                                <label>Địa chỉ <span class="required">*</span></label>
                                <input type="text" placeholder="Địa chỉ" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkout-form-list mb-30">
                                <label>Địa chỉ Email <span class="required">*</span></label>
                                <input type="email" placeholder="Địa chỉ Email" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkout-form-list mb-30">
                                <label>Số điện thoại <span class="required">*</span></label>
                                <input type="text" placeholder="Số điện thoại" />
                            </div>
                        </div>
                    </div>
                    <div class="different-address">
                        <div class="order-notes">
                            <div class="checkout-form-list">
                                <label>Ghi chú</label>
                                <textarea id="checkout-mess" cols="30" rows="10"
                                    placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ: ghi chú đặc biệt khi giao hàng."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="your-order">
                    <h3>Đơn hàng của bạn</h3>
                    <div class="your-order-table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-name">Sản phẩm</th>
                                    <th class="product-total">Giá tiền</th>
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
                                    <th>Tổng tiền giỏ hàng</th>
                                    <td><span class=" total amount">£215.00</span>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment-method">
                        <div class="mb-3">
                            <h3>Chọn Phương thức thanh toán:</h3>
                            
                            <div class="form-check border rounded p-3 mb-3 bg-white">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="paymentDirectBank" value="directBank" checked>
                                <label class="form-check-label" for="paymentDirectBank">
                                    Chuyển khoản ngân hàng trực tiếp
                                </label>
                                <div class="form-text">
                                    Thực hiện thanh toán trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng ID đơn hàng của bạn làm tài liệu tham khảo thanh toán. Đơn đặt hàng của bạn sẽ không được giao cho đến khi tiền đã được xóa trong tài khoản của chúng tôi.
                                </div>
                            </div>
                            
                            <div class="form-check border rounded p-3 mb-3 bg-white">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="paymentPaypal" value="paypal">
                                <label class="form-check-label" for="paymentPaypal">
                                    PayPal
                                </label>
                                <div class="form-text">
                                    Thanh toán qua PayPal; bạn có thể thanh toán bằng thẻ tín dụng nếu bạn không có tài khoản PayPal.
                                </div>
                            </div>

                            <div class="form-check border rounded p-3 mb-3 bg-white">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="paymentDirectBank" value="directBank" checked>
                                <label class="form-check-label" for="paymentDirectBank">
                                    Thanh toán khi nhận hàng
                                </label>
                                <div class="form-text">
                                    Khách hàng thanh toán tiền mặt khi nhận được sản phẩm.
                                </div>
                            </div>
                        </div>
                        <div class="btn-checkout text-center">
                            <button type="submit" class="btn btn-success">Thanh toán</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- checkout-area end -->
