<div class="container-xxl animated fadeInDown">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">{{ $title }}</h4>
                        </div><!--end col-->
                        <div class="col-auto">
                            <a href="{{ route('discounts.create') }}">
                                <button type="button" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i> Thêm mã giảm giá</button>
                            </a>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-header-->
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Mã Giảm Giá</th>
                                    <th>Tỷ Lệ Giảm</th>
                                    <th>Ngày Bắt Đầu</th>
                                    <th>Ngày Kết Thúc</th>
                                    <th>Giảm Giá Vĩnh Viễn</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($discounts as $discount)
                                    <tr>
                                        <td class="font-13 fw-medium">{{ $discount->code }}</td>
                                        <td class="font-13 fw-medium">{{ $discount->percentage }}%</td>
                                        <td class="font-13 fw-medium">{{ $discount->start_date }}</td>
                                        <td class="font-13 fw-medium">{{ $discount->end_date }}</td>
                                        <td class="font-13 fw-medium">{{ $discount->is_permanent ? 'Có' : 'Không' }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('discounts.edit', $discount->id) }}"><i class="las la-pen text-secondary fs-18"></i></a>
                                            <form class="d-inline" action="{{ route('discounts.destroy', $discount->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" onclick="return confirm('Bạn có muốn xóa không ?')" class="btn-reset"><i class="las la-trash-alt text-secondary fs-18"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- Phân trang --}}
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div><!-- container -->
