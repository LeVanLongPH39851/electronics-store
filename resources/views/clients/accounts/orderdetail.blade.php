@include('clients.components.breadcrumb')

<!-- My Account Page Start Here -->
<div class="my-account white-bg ptb-45">
    <div class="container">
        <div class="account-dashboard">

            <div class="row">
                <div class="col-lg-12">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard-content mt-all-40">
                        <div class="tab-pane fade show active">
                            <h3 class="mb-4 fs-4">Chi tiết đơn hàng</h3>
                            <div class="order-details mb-4">
                                <h2 class="fs-5 text-center">Mã đơn hàng: <strong>{{ $order->order_code }}</strong></h2>
                                <p class="fs-6 mb-3">Tên người nhận: <strong>{{ $order->user_name }}</strong></p>
                                <p class="fs-6 mb-3">Email người nhận: <strong>{{ $order->user->email }}</strong></p>
                                <p class="fs-6 mb-3">Số điện thoại người nhận: <strong>{{ $order->user_phone }}</strong></p>
                                <p class="fs-6 mb-3">Địa chỉ người nhận: <strong>{{ $order->user_address }}</strong></p>
                                <p class="fs-6 mb-3">Ngày đặt hàng: <strong>{{ $order->created_at->format('d-m-Y') }}</strong></p>
                                <p class="fs-6 mb-3">Trạng thái đơn hàng: <strong class="text-primary">{{ $order->status }}</strong></p>
                                <p class="fs-6 mb-3">Trạng thái thanh toán: <strong class="text-success">{{ $order->payment_status }}</strong></p>
                                <p class="fs-6 mb-3">Tổng tiền hàng: <strong class="text-danger">{{ number_format($order->total_price, 0, ',', '.') }} VNĐ</strong></p>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Hình ảnh</th>
                                            <th scope="col">Màu sắc</th>
                                            <th scope="col">SSD</th>
                                            <th scope="col">Giá nhập</th>
                                            <th scope="col">Giá niêm yết</th>
                                            <th scope="col">Giá</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Tổng giá</th>
                                            <th scope="col">Phương thức thanh toán</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orderDetails as $item)
                                            <tr>
                                                <td>{{ $item->product_name }}</td>
                                                <td>
                                                    <img src="{{ '.' . Storage::url($item->product_variant_image) }}" class="img-fluid rounded" alt="{{ $item->product_name }}" style="width: 100px; height:120px;">
                                                </td>
                                                <td>{{ $item->color_name }}</td>
                                                <td>{{ $item->ssd_name }}</td>
                                                <td>{{ number_format($item->import_price, 0, ',', '.') }} VNĐ</td>
                                                <td>{{ number_format($item->listed_price, 0, ',', '.') }} VNĐ</td>
                                                <td>{{ number_format($item->price, 0, ',', '.') }} VNĐ</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ number_format($item->price * $item->quantity, 0, ',', '.') }} VNĐ</td>
                                                <td>Thanh toán bằng tiền mặt</td>
                                            </tr>
                                        @endforeach
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
