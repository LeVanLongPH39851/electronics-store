@include('clients.components.breadcrumb')
<!-- LogIn Page Start -->
<div class="log-in ptb-45">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <!-- Returning Customer Start -->
            <div class="col-md-6">
                <div class="well">
                    <div class="return-customer">
                        <h3 class="mb-10 custom-title text-center">sign up</h3>
                        <form action="{{route('client.store.signup')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{old('name')}}" placeholder="Enter your name" class="form-control">
                                @if ($errors->has("name"))
                                <p class="text-danger mt-1">{{$errors->first("name")}}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" value="{{old('email')}}" placeholder="Enter your email address..." class="form-control">
                                @if ($errors->has("email"))
                                <p class="text-danger mt-1">{{$errors->first("email")}}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="signin_password">
                                <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                                <i class="fa fa-eye" id="togglePassword"></i>
                                </div>
                                @if ($errors->has("password"))
                                <p class="text-danger mt-1">{{$errors->first("password")}}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Comfirm Password</label>
                                <div class="signin_password">
                                <input type="password" id="confirmPassword" name="password_confirmation" placeholder="Confirm password" class="form-control">
                                <i class="fa fa-eye" id="toggleConfirmPassword"></i>
                                </div>
                                @if ($errors->has("password_confirmation"))
                                <p class="text-danger mt-1">{{$errors->first("password_confirmation")}}</p>
                                @endif
                            </div>
                            <input type="submit" value="Sign Up" class="return-customer-btn">
                        </form>
                    </div>
                </div>
            </div>
            <!-- Returning Customer End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- LogIn Page End -->

{{-- Thêm js --}}
@section('script')
<script>
    document.getElementById('togglePassword').addEventListener('click', function (e) {
    const passwordField = document.getElementById('password');
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);

    // Đổi biểu tượng mắt
    this.classList.toggle('fa-eye');
    this.classList.toggle('fa-eye-slash');
});
document.getElementById('toggleConfirmPassword').addEventListener('click', function (e) {
    const passwordField = document.getElementById('confirmPassword');
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);

    // Đổi biểu tượng mắt
    this.classList.toggle('fa-eye');
    this.classList.toggle('fa-eye-slash');
});
</script>
@endsection