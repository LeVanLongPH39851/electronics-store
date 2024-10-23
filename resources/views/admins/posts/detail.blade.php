<div class="container-xxl animated fadeInDown">
    <div class="row">                        
        <div class="col-md-12 col-lg-8">
            <div class="card">  
                <div class="card-body">
                    <div class="row align-items-center">                                        
                        <div class="col ">
                            <div class="d-flex align-items-center">
                                <div class="position-relative div-product-image">
                                    <div>
                                        <img src="{{".".Storage::url($post->image)}}" alt="post" class="img-fluid rounded">
                                    </div>
                                   
                                </div>
                                <div class=""> 
                                    <p class="m-0 mb1 fs-3 fw-bold">{{$post->title}}</p>
                                   
                                    <span class="badge bg-primary-subtle text-primary">{{date('d/m/Y', strtotime($post->created_at))}}</span>
                                                                                                                                                             
                                </div><!--end media body-->
                            </div><!--end media-->
                        </div><!--end col-->
                       
                    </div><!--end row-->
                    <div class="mt-3">
                       
                        <div class="text-body mb-1"><span class="text-body fw-semibold">Nội dung :</span>&nbsp;<span>{!!$post->content ? $post->content : "<p>Sản phẩm chưa có mô tả ngắn</p>"!!}</span></div>                                                            
                        
                    </div>
                </div><!--end card-body-->  
            </div><!--end card-->                             
        </div> <!--end col--> 
        <div class="col-md-12 col-lg-4">
            <div class="card">                                
                <div class="card-body">
                    <div class="row g-3">
                        
                        
                        <div class="col-md-6 col-lg-6"> 
                            <div class="card shadow-none border mb-3 mb-lg-0">
                                <div class="card-body p-2">
                                    <div class="d-flex align-items-center">
                                        <i class="iconoir-thumbs-up fs-24 align-self-center text-primary me-2"></i>
                                        <div class="flex-grow-1 text-truncate"> 
                                            <p class="text-primary mb-0 fw-semibold fs-13">Đánh giá</p>    
                                            <h3 class="mt-1 mb-0 fs11 fw-bold text-primary"></h3>                                                                                                                                   
                                        </div><!--end media body-->
                                    </div>
                                </div><!--end card-body-->
                            </div> <!--end card-->                     
                        </div><!--end col-->  
                        <div class="col-md-6 col-lg-6"> 
                            <div class="card shadow-none border mb-3 mb-lg-0">
                                <div class="card-body p-2">
                                    <div class="d-flex align-items-center">
                                        <i class="iconoir-eye fs-24 align-self-center text-info me-2"></i>
                                        <div class="flex-grow-1 text-truncate"> 
                                            <p class="text-info mb-0 fw-semibold fs-13">Lượt xem</p>    
                                            <h3 class="mt-1 mb-0 fs11 fw-bold text-info"></h3>                                                                                                                                   
                                        </div><!--end media body-->
                                    </div>
                                </div><!--end card-body-->
                            </div> <!--end card-body-->                     
                        </div><!--end col-->                              
                    </div><!--end row-->
                </div><!--end card-body--> 
            </div><!--end card-->
            {{-- <div class="card">                                
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="{{$product->user->image ? $product->user->image : ($product->user->role == 1 ? 'assets/images/users/avatar-default-admin.png' : 'assets/images/users/avatar-default-staff.png')}}" alt="" class="user-image rounded-circle">
                        </div>
                        <div class="flex-grow-1 ms-3 text-truncate">
                            <h4 class="mb-1 fw-semibold">{{$product->user->name}}</h4>
                            <p class="mb-3 font-13 text-{{$product->user->role == 1 ? "danger" : "blue"}}">{{$product->user->role == 1 ? "Admin" : "Nhân viên"}}</p>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-sm btn-outline-primary fs10">Xem</button>
                                <div class="d-flex flex-column justify-content-end"><span class="badge bg-primary-subtle text-primary">Người thêm</span></div>
                            </div>
                        </div><!--end media-body-->
                    </div><!--end media-->
                </div><!--end card-body--> 
            </div><!--end card--> --}}
          
        </div> <!--end col-->        
           
    </div><!--end row-->  
</div><!-- container -->