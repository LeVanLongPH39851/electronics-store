@include('clients.components.breadcrumb')
<!-- Orders List Area Start -->
<div class="orders-main-area ptb-45">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <!-- Orders Table Start -->
                <div class="table-content table-responsive mb-45">
                    <table>
                        <thead>
                            <tr>
                                <th class="order-name">Tên Người Nhận</th>
                                <th class="order-phone">Số Điện Thoại</th>
                                <th class="order-address">Địa Chỉ</th>
                                <th class="order-payment-method">Phương Thức Thanh Toán</th>
                                <th class="order-status">Trạng Thái</th>
                                <th class="order-action">Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td class="order-name">
                                    {{ $order->name }}
                                </td>
                                <td class="order-phone">
                                    {{ $order->phone }}
                                </td>
                                <td class="order-address">
                                    {{ $order->address }}
                                </td>
                                <td class="order-payment-method">
                                    {{ $order->payment_method }}
                                </td>
                                <td class="order-status">
                                    {{ $order->status }}
                                </td>
                                <td class="order-action">
                                    {{-- chuyển hướng đến chi tiết ở đây --}}
                                    <a href="#" class="btn btn-info">
                                        Xem Chi Tiết
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Orders Table End -->
            </div>
        </div>
    </div>
</div>
<!-- Orders List Area End -->
