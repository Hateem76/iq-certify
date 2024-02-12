@extends('admin.admin_master')
@section('admin')

    <div class="login-form-wrapper">
        <div class="login-form-content">
            <div>
                <div class="loginHeader">
                    <a class="header-brand" href="#">
                        <img src="{{asset('panel/img/logo.png')}}" class="img-fluid logo-img" alt="Website Logo" />
                    </a>
                    <h4 class="signup-title">Welcome Back!</h4>
                    <span class="signup-intro">Sign in to access dashboard area.</span>
                </div>

                @if(Session::has('error'))
                <div class="alert alert-danger mt-3 text-center" role="alert">
                    {{ session::get('error') }}
                </div>
                @endif


                <form id="loginForm" class="m-t-30" method="POST" action="{{route('admin.login')}}">
                    @csrf
                    <div class="form-group">
                        <img src="{{asset('panel/img/icons/user-rounded.svg')}}" class="img-fluid svg-icon icon-green form-input-icon" alt="User" />
                        <input type="email" class="form-control" id="username" name="email" title="Please enter your Email" placeholder="Email" required>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <img src="{{asset('panel/img/icons/key.svg')}}" class="img-fluid svg-icon icon-green form-input-icon" alt="Checkmark" />
                        <input type="password" class="form-control" id="password" name="password" title="Please enter your password" placeholder="Password" required>
                        <span class="help-block"></span>
                    </div>
                    <button type="submit" class="cta-btn cta-btn-acc-action">Login</button>
                </form>
                <p class="have-account-login">New on our platform? <a href="{{route('admin.register')}}">Create an account</a></p>
            </div>
        </div>
    </div>

@endsection
