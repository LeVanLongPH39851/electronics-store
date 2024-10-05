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
                            <form action="" method="POST">
                                @csrf
                                <p class="checkout-coupon">
                                    <input type="text" name="coupon_code" class="code" placeholder="Mã giảm giá" required />
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
        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="checkbox-form mb-sm-40">
                        <h3>Chi tiết thanh toán</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="checkout-form-list mb-30">
                                    <label>Họ và tên <span class="required">*</span></label>
                                    <input type="text" name="name" placeholder="Họ và tên" />
                                    @if ($errors->has('name'))
                                        <div class="text-danger">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list mb-30">
                                    <label>Địa chỉ <span class="required">*</span></label>
                                    <input type="text" name="address" placeholder="Địa chỉ" />
                                    @if ($errors->has('address'))
                                        <div class="text-danger">{{ $errors->first('address') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list mb-30">
                                    <label>Địa chỉ Email <span class="required">*</span></label>
                                    <input type="text" name="email" placeholder="Địa chỉ Email" />
                                    @if ($errors->has('email'))
                                        <div class="text-danger">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list mb-30">
                                    <label>Số điện thoại <span class="required">*</span></label>
                                    <input type="text" name="phone" placeholder="Số điện thoại" />
                                    @if ($errors->has('phone'))
                                        <div class="text-danger">{{ $errors->first('phone') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="different-address">
                            <div class="order-notes">
                                <div class="checkout-form-list">
                                    <label>Ghi chú</label>
                                    <textarea name="notes" id="checkout-mess" cols="30" rows="10" placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ: ghi chú đặc biệt khi giao hàng."></textarea>
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
                                            Product Name 1 <span class="product-quantity"> × 1</span>
                                        </td>
                                        <td class="product-total">
                                            <span class="amount">£165.00</span>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Tạm tính</th>
                                        <td><span class="amount">£165.00</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Tổng tiền</th>
                                        <td><span class="total amount">£165.00</span></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method">
                            <div class="mb-3">
                                <h3>Chọn Phương thức thanh toán:</h3>
                                <div class="form-check border rounded p-3 mb-3 bg-white">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="paymentCOD" value="cod">
                                    <label class="form-check-label" for="paymentCOD">
                                        Thanh toán khi nhận hàng
                                    </label>
                                    <div class="form-text">
                                        Khách hàng thanh toán tiền mặt khi nhận được sản phẩm.
                                    </div>
                                </div>
                                <div class="form-check border rounded p-3 mb-3 bg-white">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMoMo" value="momo">
                                    <label class="form-check-label" for="paymentMoMo">
                                        Thanh toán Online
                                    </label>
                                    <div class="form-text">
                                        Thanh toán qua ví MoMo nhanh chóng và an toàn.
                                    </div>
                                </div>
                                @if ($errors->has('paymentMethod'))
                                    <div class="text-danger">
                                        {{ $errors->first('paymentMethod') }}
                                    </div>
                                @endif
                            </div>
                            <div class="btn-checkout text-center">
                                <button type="submit" class="btn btn-success">Thanh toán</button>
                            </div>
                        </div>                    
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- checkout-area end -->
