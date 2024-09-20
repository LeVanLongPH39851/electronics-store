@include('clients.components.breadcrumb')
<!-- My Account Page Start Here -->
<div class="my-account white-bg ptb-45">
    <div class="container">
        <div class="account-dashboard">
           <div class="dashboard-upper-info">
               <div class="row align-items-center no-gutters">
                   <div class="col-xl-3 col-lg-3 col-md-6">
                       <div class="d-single-info">
                           <p class="user-name">Hello <span>yourmail@info</span></p>
                           <p>(not yourmail@info? <a href="#" class="log-out">Log Out</a>)</p>
                       </div>
                   </div>
                   <div class="col-xl-3 col-lg-4 col-md-6">
                       <div class="d-single-info">
                           <p>Need Assistance? Customer service at.</p>
                           <p>admin@example.com.</p>
                       </div>
                   </div>
                   <div class="col-xl-3 col-lg-3 col-md-6">
                       <div class="d-single-info">
                           <p>E-mail them at </p>
                           <p>support@example.com</p>
                       </div>
                   </div>
                   <div class="col-xl-3 col-lg-2 col-md-6">
                       <div class="d-single-info text-lg-center">
                           <a class="view-cart" href="cart.html"><i class="fa fa-cart-plus" aria-hidden="true"></i>view cart</a>
                       </div>
                   </div>
               </div>
           </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard-content mt-all-40">
                        <div class="tab-pane fade show active">
                            <h3>Order Detail</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Actions</th>	 	 	 	
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>May 10, 2018</td>
                                            <td>Processing</td>
                                            <td>$25.00 for 1 item </td>
                                            <td><a class="view" href="cart.html">view</a></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>May 10, 2018</td>
                                            <td>Processing</td>
                                            <td>$17.00 for 1 item </td>
                                            <td><a class="view" href="cart.html">view</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- My Account Page End Here -->