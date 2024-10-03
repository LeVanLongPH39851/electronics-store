<div class="container-xxl animated fadeInDown">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">{{ $title }}</h4>
                        </div><!--end col-->
                    </div> <!--end row-->
                </div><!--end card-header-->
                <div class="card-body pt-0">
                    <form action="{{ route('color.update',  $color->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label text-end">ID</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{ $color->id }}" disabled>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-8">
                                <div class="mb-3 row">
                                    <label class="col-sm-4 col-form-label text-end">Tên màu sắc <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                            name="name" value="{{ old('name', $color->name) }}" type="text"
                                            placeholder="Nhập vào tên màu sắc">
                                        @if ($errors->has('name'))
                                            <p class="text-danger mt-1 mb-0">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-end mb-3">
                                    {{-- <button type="reset" class="btn btn-danger mr1">Reset</button> --}}
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

{{-- Thêm js --}}
@section('script')
    {{-- <script>
    function showImage(event){
     const image = document.getElementById('image');
     const file = event.target.files[0];
     const render = new FileReader();
     render.onload = function () {
        image.src = render.result;
        image.style.display = "block";
     }
     if(file){
        render.readAsDataURL(file);
     }
    }
    document.getElementById('togglePassword').addEventListener('click', function (e) {
    const passwordField = document.getElementById('password');
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);

    // Đổi biểu tượng mắt
    this.classList.toggle('fa-eye');
    this.classList.toggle('fa-eye-slash');
});
</script> --}}
@endsection