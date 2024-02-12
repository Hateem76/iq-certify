@extends('admin.admin_master')
@section('admin')

    <div class="registration-form-wrapper">
        <div class="registration-form-content">
            <div>
                <div class="loginHeader">
                    <a class="header-brand" href="#">
                        <img src="{{asset('panel/img/logo.png')}}" class="img-fluid logo-img" alt="Website Logo" />
                    </a>
                    <h4 class="signup-title">Join Us!</h4>
                    <span class="signup-intro">Sign up below to join the biggest IQ Test community in Spain and access your results history!</span>
                </div>
                <form id="loginForm" method="POST" action="{{route('admin.register.create')}}">
                    @csrf
{{--                    <div class="form-group">--}}
{{--                        <input type="text" class="form-control form-control-pl" id="fullname" name="fullname" title="Please enter your Full Name" placeholder="Your name" required>--}}
{{--                        <span class="help-block"></span>--}}
{{--                    </div>--}}
                    <div class="form-group">
                        <input type="text" class="form-control form-control-pl" id="username" name="username" title="Please enter your username" placeholder="Your username" required>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-pl" id="email" name="email" title="Please enter your email" placeholder="Email" required>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-pl" id="password" name="password" title="Please enter your password" placeholder="Password" required>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-pl" id="password_confirm" name="password_confirm" title="Please re-enter your password" placeholder="Confirm password" required>
                        <span class="help-block"></span>
                    </div>
{{--                    <div class="input-group mb-3" style="display:none;">--}}
{{--                        <input type="hidden" name="answer" class="form-control" value="<?php echo htmlspecialchars($random_number1+$random_number2); ?>">--}}
{{--                        <input type="hidden" name="firstRandomNumber" value="<?php echo htmlspecialchars($random_number1); ?>">--}}
{{--                        <input type="hidden" name="secondRandomNumber" value="<?php echo htmlspecialchars($random_number2); ?>">--}}
{{--                        <input type="hidden" name="referer" value="<?php echo htmlspecialchars($referer); ?>">--}}
{{--                        <input type="hidden" name="referral" value="<?php if (htmlspecialchars(isset($_COOKIE["referral"]))){ echo htmlspecialchars($_COOKIE["referral"]);} ?>">--}}
{{--                    </div>--}}
                    <div class="form-group">
                        <label class="custom-switch">
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" required>
                            <span class="custom-switch-checkmark"></span>
                            <span class="custom-switch-description">I accept the <a href="/terms" target="_blank">Terms & Conditions</a>, <a href="/privacy" target="_blank">Privacy Policy</a></span>
                        </label>
                    </div>
                    <button type="submit" class="cta-btn cta-btn-acc-action">Sign up</button>
                </form>
                <p class="have-account-login">Already have an account? <a href="{{route('login_form')}}">Login</a></p>
            </div>
        </div>
    </div>

@endsection
