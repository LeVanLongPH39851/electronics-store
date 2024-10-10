@include('clients.components.breadcrumb')

<!-- My Account Page Start Here -->
<div class="my-account white-bg pt-5 pb-5">
    <div class="container">
        <div class="account-dashboard">

            <div class="row">
                <div class="col-lg-12">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard-content mt-4">
                        <div class="tab-pane fade show active">
                            <h3 class="mb-4 fs-4 text-center">Chi tiết đơn hàng</h3>
                            @php
                                //logic method status
                                if ($order->payment_method == 'cod') {
                                    $pttt = 'Thanh toán bằng tiền mặt';
                                } elseif ($order->payment_method == 'online') {
                                    $pttt = 'Thanh toán online';
                                }
                                //logic payment status
                                // if ($order->payment_status == 'ctt') {
                                //     $tttt = 'Đã thanh toán';
                                // } elseif ($order->payment_status == 'dtt') {
                                //     $tttt = 'Chưa thanh toán';
                                // }
                                // //logic payment status
                                // if ($order->status == 'cxn') {
                                //     $ttdh = 'Chờ xác nhận';
                                // } elseif ($order->status == 'dxn') {
                                //     $ttdh = 'Đã xác nhận';
                                // }
                            @endphp
                            {{$order}}
                            <!-- Order Details Section -->
                            <div class="order-details mb-5 p-4 bg-light rounded shadow-sm">
                                <h4 class="fs-5 text-center mb-4">Mã đơn hàng: <strong>{{ $order->order_code }}</strong>
                                </h4>
                                <p class="fs-6 mb-3"><strong>Tên người nhận:</strong> {{ $order->user_name }}</p>
                                <p class="fs-6 mb-3"><strong>Email người nhận:</strong> {{ $order->user->email }}</p>
                                <p class="fs-6 mb-3"><strong>Số điện thoại:</strong> {{ $order->user_phone }}</p>
                                <p class="fs-6 mb-3"><strong>Địa chỉ người nhận:</strong> {{ $order->user_address }}</p>
                                <p class="fs-6 mb-3"><strong>Ngày đặt hàng:</strong>
                                    {{ $order->created_at->format('d-m-Y') }}</p>
                                <p class="fs-6 mb-3"><strong>Trạng thái đơn hàng:</strong> <span class="badge badge-primary">{{ $order->payment_status }}</span></p>
                                <p class="fs-6 mb-3"><strong>Trạng thái thanh toán:</strong> <span class="badge badge-success">{{ $order->status }}</span></p>
                                <p class="fs-6 mb-3"><strong>Tổng tiền hàng:</strong> <span
                                        class="text-danger">{{ number_format($order->total_price, 0, ',', '.') }}
                                        VNĐ</span></p>
                                <p class="fs-6 mb-3"><strong>Phương thức thanh toán:</strong> {{ $pttt }}</p>
                            </div>
                            <!-- Order Details Section End -->
                            {{-- <form action="" method="post">
                                <div class="row mt-3">
                                    <form action="" method="post">
                                            <input type="hidden" name="dh">
                                            <button type="submit" class="btn btn-danger">Hủy đơn hàng</button>
                                    </form>
                                </div>
                            </form> --}}
                            <!-- Products Table -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="thead-light">
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
                                            {{-- <th scope="col">Phương thức thanh toán</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orderDetails as $item)
                                            <tr>
                                                <td>{{ $item->product_name }}</td>
                                                <td>
                                                    <img src="{{ '.' . Storage::url($item->product_variant_image) }}"
                                                        class="img-fluid rounded" alt="{{ $item->product_name }}"
                                                        style="width: 100px; height:120px; object-fit: cover;">
                                                </td>
                                                <td>{{ $item->color_name }}</td>
                                                <td>{{ $item->ssd_name }}</td>
                                                <td>{{ number_format($item->import_price, 0, ',', '.') }} VNĐ</td>
                                                <td>{{ number_format($item->listed_price, 0, ',', '.') }} VNĐ</td>
                                                <td>{{ number_format($item->price, 0, ',', '.') }} VNĐ</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                                    VNĐ</td>
                                                {{-- <td>Thanh toán bằng tiền mặt</td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Back to Account Button -->
                            <div class="text-right mt-4">
                                {{-- <a href="{{ route('account.orders') }}" class="btn btn-primary">Quay lại danh sách đơn hàng</a> --}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- My Account Page End Here -->
