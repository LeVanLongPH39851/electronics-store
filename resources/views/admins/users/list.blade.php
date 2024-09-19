<div class="container-xxl animated fadeInDown"> 
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">                      
                            <h4 class="card-title">{{$title}}</h4>                      
                        </div><!--end col-->
                        <div class="col-auto"> 
                            <form id="form_filter" method="GET" action="{{route('user.index')}}" class="row g-2">
                                <div class="col-auto">
                                    <select name="perPage" class="form-select" onchange="submitForm()">
                                        <option {{ request('perPage') == 8 ? "selected" : ""}} value="8">8 users</option>
                                        <option {{ request('perPage') == 10 ? "selected" : ""}} value="10">10 users</option>
                                        <option {{ request('perPage') == 12 ? "selected" : ""}} value="12">12 users</option>
                                        <option {{ request('perPage') == 15 ? "selected" : ""}} value="15">15 users</option>
                                        <option {{ request('perPage') == 18 ? "selected" : ""}} value="18">18 users</option>
                                        {{-- request('perPage'): dữ lại value cũ của perPage --}}
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <select name="orderBy" class="form-select" onchange="submitForm()">
                                        <option {{ request('orderBy') == "lastest" ? "selected" : ""}} value="lastest">Lastest</option>
                                        <option {{ request('orderBy') == "oldest" ? "selected" : ""}} value="oldest">Oldest</option>
                                        {{-- request('orderBy'): dữ lại value cũ của orderBy --}}
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <select name="role" class="form-select" onchange="submitForm()">
                                        <option {{ request('role') == 0 ? "selected" : ""}} value="0">Role</option>
                                        @foreach ($roles as $role) {{-- in danh sách roles --}}
                                        <option {{ request('role') == $role->id ? "selected" : ""}} value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                        {{-- request('role'): dữ lại value cũ của role --}}
                                    </select>
                                </div>

                                <div class="col-auto d-flex">
                                    <input type="text" id="keyword-input" class="form-control border-end-0" name="keyWord" value="{{request('keyWord')}}" placeholder="Keyword..." style="border-top-right-radius: 0; border-bottom-right-radius: 0">
                                    {{-- request('keyWord'): dữ lại value cũ của keyWord --}}
                                    <button class="btn btn-info" style="border-top-left-radius: 0; border-bottom-left-radius: 0" onclick="validateAndSubmit()">Search</button>
                                </div>

                                <div class="col-auto">
                                  <button type="submit" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#addBoard"><i class="fa-solid fa-plus me-1"></i> Add Product</button>
                                </div><!--end col-->
                            </form>    
                        </div><!--end col-->
                    </div><!--end row-->                                  
                </div><!--end card-header-->
                <div class="card-body pt-0">
                    
                    <div class="table-responsive">
                        <table class="table mb-0 checkbox-all" id="datatable_1">
                            <thead class="table-light">
                              <tr>
                                <th style="width: 16px;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="select-all" id="select-all">                                                    
                                    </div>
                                </th>
                                <th class="ps-0">ID</th>
                                <th>Avatar</th>
                                <th>Email</th>
                                <th>Joining date</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Status</th>
                                <th class="text-end">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user) {{-- In danh sách users --}}
                                <tr>
                                    <td style="width: 16px;">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="check"  id="customCheck1">
                                        </div>
                                    </td>
                                    <td class="ps-0"><span class="badge bg-transparent border border-{{$user->role_id == 1 ? "danger" : ($user->role_id == 2 ? "blue" : "primary")}} text-{{$user->role_id == 1 ? "danger" : ($user->role_id == 2 ? "blue" : "primary")}}">{{$user->user_code}}</span></td>
                                    {{-- Admin = danger, Staff = blue, User = primary --}}
                                    <td>
                                        <img src="{{$user->image ? Storage::url($user->image) : "assets/images/users/avatar-default.png"}}" alt="" class="thumb-md d-inline rounded-circle me-1">
                                        <p class="d-inline-block align-middle mb-0">
                                            <span class="font-13 fw-medium">{{$user->name}}</span> 
                                        </p>
                                    </td>
                                    <td><a href="#" class="d-inline-block align-middle mb-0 text-body">{{$user->email}}</a></td>
                                    <td>{{date('d.m.Y', strtotime($user->created_at))}}</td>
                                    @php
                                        $color = $user->role->name === "Admin" ? "danger" : ($user->role->name === "Staff" ? "blue" : "primary")
                                        // Admin = danger, Staff = blue, User = primary
                                    @endphp
                                    <td class="text-center"><span class="badge bg-{{$color}}-subtle text-{{$color}} text-capitalize">{{$user->role->name}}</span></td>
                                    {{-- $color: in class ra, $user->role->name: lấy tên vai trò --}}
                                    <td class="text-center"><span class="badge bg-{{$user->status === "active" ? "success" : "danger"}} text-capitalize">{{$user->status}}</span></td>
                                    {{-- Hiển thị trạng thái và in màu tương ứng --}}
                                    <td class="text-end">                                                       
                                        <a href="#"><i class="las la-pen text-secondary fs-18"></i></a>
                                        <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="7" class="text-danger">No users found</td></tr>
                                @endforelse                                                                                   
                            </tbody>
                            <tfoot>
                                <tr>
                                  <th style="width: 16px;">
                                      <div class="form-check">
                                          <input type="checkbox" class="form-check-input" name="select-all" id="select-all">                                                    
                                      </div>
                                  </th>
                                  <th class="ps-0" colspan="2">
                                    <select name="" class="form-select w-auto">
                                        <option value="0">Action</option>
                                        <option value="0">Delete</option>
                                    </select>
                                  </th>
                                  <th colspan="5"></th>
                                </tr>
                              </tfoot>
                        </table>
                        <div class="mt-3">{{ $users->appends(request()->query())->links('pagination::bootstrap-5') }}</div> {{-- Phân trang --}}
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->                                     
</div><!-- container -->

{{-- Thêm js --}}
@section('script')
 <script>
    function submitForm() {
      document.getElementById('form_filter').submit();
    }
    function validateAndSubmit() {
            var keyword = document.getElementById('keyword-input').value;
            if (keyword.trim() === "") {
                alert("Please enter keyword before searching");
                return false;
            }
            document.getElementById('form_filter').submit();
        }
 </script>
@endsection