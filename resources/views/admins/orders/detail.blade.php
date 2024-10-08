<div class="container-xxl animated fadeInDown"> 
        <div class="row">
            <div class="col-lg-8">
                
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">                      
                                <h4 class="card-title">{{$order->order_code}}</h4>  
                                <p class="mb-0 text-muted mt-1">Ngày đặt: {{date('d/m/Y', strtotime($order->created_at))}}</p>                    
                            </div><!--end col-->
                        </div>  <!--end row-->                                  
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-light">
                                  <tr>
                                    <th>Sản phẩm</th>
                                    <th class="text-end">Giá</th>
                                    <th class="text-end">Số lượng</th>
                                    <th class="text-end">Thành tiền</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderDetails as $orderDetail)
                                    <tr>
                                        <td>
                                            <img src="{{".".Storage::url($orderDetail->product_variant_image)}}" alt="" height="40">
                                            <p class="d-inline-block align-middle mb-0">
                                                <span class="d-block align-middle mb-0 product-name text-body">{{$orderDetail->product_name}}</span>
                                                <span class="text-muted font-13">({{$orderDetail->color_name}} - {{$orderDetail->ssd_name}})</span> 
                                            </p>
                                        </td>
                                        <td class="text-end">{{number_format($orderDetail->price, 0, '', '.')}} vnđ</td>
                                        <td class="text-end">{{$orderDetail->quantity}}</td>                                                    
                                        <td class="text-end">{{number_format($orderDetail->price * $orderDetail->quantity, 0, '', '.')}} vnđ</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!--card-body-->
                </div><!--end card-->
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">                      
                                <h4 class="card-title">Bought - Awaiting Delivery</h4>                      
                            </div><!--end col-->
                            <div class="col-auto">                      
                                <a href="#" class="text-secondary"><i class="fas fa-download me-1"></i> Download Invoice</a>                     
                            </div><!--end col-->
                        </div>  <!--end row-->                                  
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <div class="position-relative m-4">
                            <div class="progress" role="progressbar" aria-label="Progress" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="height: 1px;">
                              <div class="progress-bar" style="width: 50%"></div>
                            </div>
                            <div class="position-absolute top-0 start-0 translate-middle bg-primary text-white rounded-pill thumb-md"><i class="iconoir-home"></i></div>
                            <div class="position-absolute top-0 start-50 translate-middle bg-primary-subtle text-primary rounded-pill thumb-md"><i class="iconoir-delivery-truck"></i></div>
                            <div class="position-absolute top-0 start-100 translate-middle bg-light text-dark rounded-pill thumb-md"><i class="iconoir-map-pin"></i></div>
                        </div>
                        <div class="row row-cols-3">
                            <div class="col text-start">
                                <h6 class="mb-1">Order Created</h6>
                                <p class="mb-0 text-muted fs-12 fw-medium">15 Feb 2024, 11:30 AM</p>
                            </div> <!-- end col -->
                            <div class="col text-center">
                                <h6 class="mb-1">On Delivery</h6>
                                <p class="mb-0 text-muted fs-12 fw-medium">18 Feb 2024, 05:15 PM</p>
                            </div> <!-- end col -->
                            <div class="col text-end">
                                <h6 class="mb-1">Order Delivered</h6>
                                <p class="mb-0 text-muted fs-12 fw-medium">20 Feb 2024, 01:00 PM</p>
                            </div> <!-- end col -->
                        </div> <!-- end row -->                                    
                        <div class="bg-primary-subtle p-2 border-dashed border-primary rounded mt-3">
                            <span class="text-primary fw-semibold">Note :</span><span class="text-primary fw-normal"> Ship all the ordered item together by monday and i send you an email please check. Thanks!</span>
                        </div>
                    </div><!--card-body-->
                </div><!--end card-->
            </div> <!-- end col -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">                      
                                <h4 class="card-title">Thông tin thanh toán</h4>                      
                            </div><!--end col-->
                            <div class="col-auto">                      
                                <span class="badge rounded text-warning bg-warning-subtle fs-12 p-1">
                                    <span>{{$order->status === "cxn" ? "Đang chờ xác nhận" : ($order->status === "dxc" ? "Đã xác nhận" : ($order->status === "dgh" ? "Đang giao hàng" : ($order->status === "ghtc" ? "Giao hành thành công" : ($order->status === "ghtb" ? "Giao hành thất bại" : ($order->status === "dh" ? "Đã hủy" : "Đã nhận hàng")))))}}</span>
                                </span>                  
                            </div><!--end col-->
                        </div>  <!--end row-->                                  
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <div>
                            <div class="d-flex justify-content-between">
                              <p class="text-body fw-semibold">Phương thức thanh toán :</p>
                              <p class="text-body-emphasis fw-semibold text-uppercase">{{$orderDetail->order->payment_method}}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                              <p class="text-body fw-semibold">Trạng thái thanh toán :</p>
                              <p class="text-danger fw-semibold">{{$orderDetail->order->payment_status === "ctt" ? "Chưa thanh toán" : "Đã thanh toán"}}</p>
                            </div>
                        </div>
                        <hr class="hr-dashed">
                        <div class="d-flex justify-content-between">
                            <h4 class="mb-0">Tổng cộng :</h4>
                            <h4 class="mb-0 text-danger">{{number_format($orderDetail->order->total_price, 0, '', '.')}} vnđ</h4>
                          </div>
                    </div><!--card-body-->
                </div><!--end card-->
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">                      
                                <h4 class="card-title">Thông tin khách hàng</h4>                      
                            </div><!--end col-->
                        </div>  <!--end row-->                                  
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <div>
                            <div class="d-flex justify-content-between mb-2">
                              <p class="text-body fw-semibold"><i class="iconoir-profile-circle text-secondary fs-20 align-middle me-1"></i>Họ và tên :</p>
                              <p class="text-body-emphasis fw-semibold">{{$orderDetail->order->user_name}}</p>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <p class="text-body fw-semibold"><i class="iconoir-people-tag text-secondary fs-20 align-middle me-1"></i>Full Name :</p>
                                <p class="text-body-emphasis fw-semibold">{{$orderDetail->order->user_phone}}</p>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <p class="text-body fw-semibold"><i class="iconoir-mail text-secondary fs-20 align-middle me-1"></i>Địa chỉ :</p>
                                <p class="text-body-emphasis fw-semibold">{{$orderDetail->order->user_address}}</p>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <p class="text-body fw-semibold"><i class="iconoir-calendar text-secondary fs-20 align-middle me-1"></i>Ngày đặt :</p>
                                <p class="text-body-emphasis fw-semibold">{{date('d/m/Y', strtotime($order->created_at))}}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="text-body fw-semibold"><i class="iconoir-dollar-circle text-secondary fs-20 align-middle me-1"></i>Tổng tiền :</p>
                                <p class="text-body-emphasis fw-semibold"><span class="text-primary">{{number_format($orderDetail->order->total_price, 0, '', '.')}} vnđ</span></p>
                            </div>
                        </div>
                    </div><!--card-body-->
                </div><!--end card-->
            </div> <!-- end col -->
        </div> <!-- end row -->                                       
</div><!-- container -->