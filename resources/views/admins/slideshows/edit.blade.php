<div class="container-xxl animated fadeInDown">
    <form id="myForm" action="{{ route('slide-show.update', $slideShow->id) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('put')
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
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label text-end">Tên slide <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                            name="name" value="{{ old('name', $slideShow->name) }}" type="text"
                                            placeholder="Nhập tên slide show">
                                        @if ($errors->has('name'))
                                            <p class="text-danger mt-1 mb-0">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label text-end">Các ảnh <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <div id="drag-drop-area"
                                            class="{{ $errors->has('galleries.*') ? 'border border-danger rounded' : '' }}">
                                            <input type="file" name="galleries[]" multiple style="display: none" />
                                        </div>
                                        <p>Hình ảnh hiện tại <span class="text-danger">(Chọn để xóa)</span></p>
                                        <div class="row g-1">
                                            @foreach ($slideShow->slideShowGalleries->sortByDesc('id') as $index => $slideShowGallery)
                                                <div class="col-3">
                                                    <select name="orderProducts[{{ $slideShowGallery->id }}]"
                                                        class="form-select fs-10" style="margin-bottom: 1px">
                                                        <option value="0">-- Ví trị --</option>
                                                        @foreach ($slideShow->slideShowGalleries as $key => $value)
                                                            <option
                                                                {{ old('orderProducts.' . $slideShowGallery->id, $slideShowGallery->order) == $key + 1 ? 'selected' : '' }}
                                                                value="{{ $key + 1 }}">{{ $key + 1 }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="position-relative">
                                                        <img src="{{ '.' . Storage::url($slideShowGallery->image) }}"
                                                            class="w-100 rounded" alt="">
                                                        <input class="position-absolute bottom-0 end-0" type="checkbox"
                                                            name="delete_galleries[{{ $slideShowGallery->id }}]"
                                                            {{ old('delete_galleries.' . $slideShowGallery->id) ? 'checked' : '' }}>
                                                    </div>
                                                    <input name="linkProducts[{{ $slideShowGallery->id }}]"
                                                        class="form-control fs-10" style="margin-top: 1px"/>


                                                </div>
                                            @endforeach
                                        </div>
                                        @if ($errors->has('galleries.*'))
                                            <p class="text-danger mt-1 mb-0">{{ $errors->first('galleries.*') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label text-end">Ảnh <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <div class="position-relative">
                                            <input class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}"
                                                name="image" type="file" onchange="showImage(event)">
                                            <img src="{{ '.' . Storage::url($slideShow->image_one) }}"
                                                class="image-style position-absolute" style="display: block"
                                                id="image" alt="image">
                                        </div>
                                        @if ($errors->has('image'))
                                            <p class="text-danger mt-1 mb-0">{{ $errors->first('image') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label text-end">Link <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="link"
                                            value="{{ old('link', $slideShow->link_one) }}"
                                            placeholder="Nhập link cho slide show"
                                            class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}">
                                        @if ($errors->has('link'))
                                            <p class="text-danger mt-1 mb-0">{{ $errors->first('link') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label text-end">Ảnh <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <div class="position-relative">
                                            <input
                                                class="form-control {{ $errors->has('image2') ? 'is-invalid' : '' }}"
                                                name="image2" type="file" onchange="showImage2(event)">
                                            <img src="{{ '.' . Storage::url($slideShow->image_two) }}"
                                                class="image-style position-absolute" style="display: block"
                                                id="image2" alt="image2">
                                        </div>
                                        @if ($errors->has('image'))
                                            <p class="text-danger mt-1 mb-0">{{ $errors->first('image') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label text-end">Link <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="link2"
                                            value="{{ old('link2', $slideShow->link_two) }}"
                                            placeholder="Nhập link cho slide show"
                                            class="form-control {{ $errors->has('link2') ? 'is-invalid' : '' }}">
                                        @if ($errors->has('link2'))
                                            <p class="text-danger mt-1 mb-0">{{ $errors->first('link2') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label text-end">Ảnh <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <div class="position-relative">
                                            <input
                                                class="form-control {{ $errors->has('image3') ? 'is-invalid' : '' }}"
                                                name="image3" type="file" onchange="showImage3(event)">
                                            <img src="{{ '.' . Storage::url($slideShow->image_three) }}"
                                                class="image-style position-absolute" style="display: block"
                                                id="image3" alt="image3">
                                        </div>
                                        @if ($errors->has('image3'))
                                            <p class="text-danger mt-1 mb-0">{{ $errors->first('image3') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label text-end">Link <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="link3"
                                            value="{{ old('link3', $slideShow->link_three) }}"
                                            placeholder="Nhập link cho slide show"
                                            class="form-control {{ $errors->has('link3') ? 'is-invalid' : '' }}">
                                        @if ($errors->has('link3'))
                                            <p class="text-danger mt-1 mb-0">{{ $errors->first('link3') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-end mb-3">
                                    <button type="reset" class="btn btn-danger mr1">Hủy</button>
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </div><!--end col-->
                        </div> <!--end row-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
        </div><!--end row-->
    </form>
</div>

{{-- Thêm js --}}
@section('script')
    <script src="assets/libs/uppy/uppy.legacy.min.js"></script>
    <script src="assets/js/pages/file-upload.init.js"></script>
    <script>
        function showImage(event) {
            const image = document.getElementById('image');
            const file = event.target.files[0];
            const render = new FileReader();
            render.onload = function() {
                image.src = render.result;
                image.style.display = "block";
            }
            if (file) {
                render.readAsDataURL(file);
            }
        }

        function showImage2(event) {
            const image = document.getElementById('image2');
            const file = event.target.files[0];
            const render = new FileReader();
            render.onload = function() {
                image.src = render.result;
                image.style.display = "block";
            }
            if (file) {
                render.readAsDataURL(file);
            }
        }

        function showImage3(event) {
            const image = document.getElementById('image3');
            const file = event.target.files[0];
            const render = new FileReader();
            render.onload = function() {
                image.src = render.result;
                image.style.display = "block";
            }
            if (file) {
                render.readAsDataURL(file);
            }
        }
    </script>
@endsection
