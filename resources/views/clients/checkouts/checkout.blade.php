@include('clients.components.breadcrumb')
<!-- coupon-area start -->
<div class="coupon-area pt-45">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="coupon-accordion">
                    <!-- ACCORDION START -->
                    {{-- <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                    <div id="checkout-login" class="coupon-content">
                        <div class="coupon-info">
                            <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est sit amet ipsum luctus.</p>
                            <form action="#">
                                <p class="form-row-first">
                                    <label>Username or email <span class="required">*</span></label>
                                    <input type="text" />
                                </p>
                                <p class="form-row-last">
                                    <label>Password  <span class="required">*</span></label>
                                    <input type="text" />
                                </p>
                                <p class="form-row">
                                    <input type="submit" value="Login" />
                                    <label>
                                    <input type="checkbox" />
                                     Remember me 
                                </label>
                                </p>
                                <p class="lost-password">
                                    <a href="#">Lost your password?</a>
                                </p>
                            </form>
                        </div>
                    </div> --}}
                    <!-- ACCORDION END -->
                    <!-- ACCORDION START -->
                    <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                    <div id="checkout_coupon" class="coupon-checkout-content">
                        <div class="coupon-info">
                            <form action="#">
                                <p class="checkout-coupon">
                                    <input type="text" class="code" placeholder="Coupon code" />
                                    <input type="submit" value="Apply Coupon" />
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
                    <h3>Billing Details</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="checkout-form-list mb-30">
                                <label>Name <span class="required">*</span></label>
                                <input type="text" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkout-form-list mb-30">
                                <label>Address <span class="required">*</span></label>
                                <input type="text" placeholder="Street address" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkout-form-list mb-30">
                                <label>Email Address <span class="required">*</span></label>
                                <input type="email" placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkout-form-list mb-30">
                                <label>Phone <span class="required">*</span></label>
                                <input type="text" placeholder="Postcode / Zip" />
                            </div>
                        </div>
                    </div>
                    <div class="different-address">
                        <div class="order-notes">
                            <div class="checkout-form-list">
                                <label>Order Notes</label>
                                <textarea id="checkout-mess" cols="30" rows="10"
                                    placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="your-order">
                    <h3>Your order</h3>
                    <div class="your-order-table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-name">Product</th>
                                    <th class="product-total">Total</th>
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
                                    <th>Cart Subtotal</th>
                                    <td><span class="amount">£215.00</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Order Total</th>
                                    <td><span class=" total amount">£215.00</span>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment-method">
                        <div class="mb-3">
                            <h3>Select Payment Method:</h3>
                            
                            <div class="form-check border rounded p-3 mb-3 bg-white">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="paymentDirectBank" value="directBank" checked>
                                <label class="form-check-label" for="paymentDirectBank">
                                    Direct Bank Transfer
                                </label>
                                <div class="form-text">
                                    Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.
                                </div>
                            </div>
                            
                            <div class="form-check border rounded p-3 mb-3 bg-white">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="paymentCheque" value="cheque">
                                <label class="form-check-label" for="paymentCheque">
                                    Cheque Payment
                                </label>
                                <div class="form-text">
                                    Please send your cheque to Store Name, Store Street, Store Town, Store State/County, Store Postcode.
                                </div>
                            </div>
                            
                            <div class="form-check border rounded p-3 mb-3 bg-white">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="paymentPaypal" value="paypal">
                                <label class="form-check-label" for="paymentPaypal">
                                    PayPal
                                </label>
                                <div class="form-text">
                                    Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- checkout-area end -->
