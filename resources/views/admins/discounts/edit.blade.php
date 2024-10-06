<div class="container-xxl animated fadeInDown">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $title }}</h4>
                </div><!--end card-header-->
                <div class="card-body pt-0">
                    <form action="{{ route('discount.update', $discount->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label text-end">Mã Giảm Giá <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" name="code" value="{{ old('code', $discount->code) }}" type="text" placeholder="Nhập mã giảm giá">
                                        @if ($errors->has('code'))
                                            <p class="text-danger mt-1 mb-0">{{ $errors->first('code') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-end mb-3">
                                    <button type="submit" class="btn btn-primary">Sửa</button>
                                </div>
                            </div><!--end col-->
                        </div> <!--end row-->
                    </form>
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-->
    </div><!--end row-->
</div>