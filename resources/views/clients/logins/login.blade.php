@include('clients.components.breadcrumb')
<!-- LogIn Page Start -->
<div class="log-in ptb-45">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <!-- Returning Customer Start -->
            <div class="col-md-6">
                <div class="well">
                    <div class="return-customer">
                        <h3 class="mb-10 custom-title text-center">login</h3>
                        <form action="{{route('client.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" value="{{old('email')}}" placeholder="Enter your email address..." class="form-control">
                                @if ($errors->has("email"))
                                <p class="text-danger mt-1">{{$errors->first("email")}}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Password" class="form-control">
                                @if ($errors->has("password"))
                                <p class="text-danger mt-1">{{$errors->first("password")}}</p>
                                @endif
                            </div>
                            <div class="d-flex justify-content-between"><div class="d-flex align-items-center" style="font-size: 13px"><input type="checkbox" class="me-1"><span>Remember me</span></div><p class="lost-password mt-0"><a href="forgot-password.html">Forgot password?</a></p></div>
                            <input type="submit" value="Login" class="return-customer-btn">
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