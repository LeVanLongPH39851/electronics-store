<div class="container-xxl animated fadeInDown">
    <div class="row">
        <div class="col-7">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $title }}</h4>
                </div><!--end card-header-->
                <div class="card-body pt-0">
                    <form action="{{ route('discounts.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="discount_code" class="form-label">Mã Giảm Giá <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="discount_code" name="discount_code" placeholder="Nhập mã giảm giá" value="{{ old('discount_code') }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="permanent" class="form-label">Giảm Giá Vĩnh Viễn</label>
                                    <select name="permanent" id="permanent" class="form-control">
                                        <option value="1">Có</option>
                                        <option value="0">Không</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="percent" class="form-label">Phần Trăm Giảm Giá <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control {{ $errors->has('percent') ? 'is-invalid' : '' }}" id="percent" name="percent" value="{{ old('percent') }}" min="0" max="100" placeholder="Nhập phần trăm giảm giá">
                                    @if ($errors->has('percent'))
                                        <div class="invalid-feedback">{{ $errors->first('percent') }}</div>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <label for="minimum_spend" class="form-label">Chi Tiêu Tối Thiểu</label>
                                    <input type="number" class="form-control {{ $errors->has('minimum_spend') ? 'is-invalid' : '' }}" id="minimum_spend" name="minimum_spend" value="{{ old('minimum_spend') }}" placeholder="Nhập chi tiêu tối thiểu">
                                    @if ($errors->has('minimum_spend'))
                                        <div class="invalid-feedback">{{ $errors->first('minimum_spend') }}</div>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <label for="maximum_spend" class="form-label">Chi Tiêu Tối Đa</label>
                                    <input type="number" class="form-control {{ $errors->has('maximum_spend') ? 'is-invalid' : '' }}" id="maximum_spend" name="maximum_spend" value="{{ old('maximum_spend') }}" placeholder="Nhập chi tiêu tối đa">
                                    @if ($errors->has('maximum_spend'))
                                        <div class="invalid-feedback">{{ $errors->first('maximum_spend') }}</div>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <label for="limit" class="form-label">Giới Hạn Lần Sử Dụng</label>
                                    <input type="number" class="form-control {{ $errors->has('limit') ? 'is-invalid' : '' }}" id="limit" name="limit" value="{{ old('limit') }}" placeholder="Nhập giới hạn sử dụng">
                                    @if ($errors->has('limit'))
                                        <div class="invalid-feedback">{{ $errors->first('limit') }}</div>
                                    @endif
                                </div>

                                <div class="text-end mb-3">
                                    <a href="{{ route('discounts.index') }}" class="btn btn-secondary me-md-2">Trở Về</a>
                                    <button type="submit" class="btn btn-primary">Tạo mới</button>
                                </div>
                            </div><!--end col-->
                        </div> <!--end row-->
                    </form>
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-12 để kéo dài form -->
    </div><!--end row-->
</div>
