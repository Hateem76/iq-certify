@extends('frontend.layouts.main')
@section('main-container')
    <?php
    $alphabets = [
        1=>'A',
        2=>'B',
        3=>'C',
        4=>'D',
        5=>'E',
        6=>'F'
    ]
    ?>


    <div class="container">
        <div class="registration-form-wrapper my-3">
            <div class="registration-form-content">
                <div>
                    <div class="loginHeader ">
                        <a class="header-brand" href="index">
                            <img src="{{asset('panel/img/logo.png')}}" class="img-fluid logo-img" alt="Website Logo" />
                        </a>
                        <h4 class="signup-title">Join Us!</h4>
                        <span class="signup-intro">Sign up below to join the biggest IQ Test community in Spain and access your results history!</span>
                    </div>
                    <form id="loginForm" method="POST" action="{{url('registration')}}">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control form-control-pl" id="name" name="name" title="Please enter your Full Name" placeholder="Your name" required>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-pl" id="email" name="email" title="Please enter your email" placeholder="Your email" required>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-pl" id="age" name="age" title="Please enter your Age" placeholder="Age" required>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-pl" id="password" name="password" title="Please enter your Coun try" placeholder="Password" required>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-pl" id="edu_level" name="edu_level" title="Educational Level" placeholder="Educational Level" required>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-pl" id="field_of_study" name="field_of_study" title="Field Of Studies" placeholder="Field Of Studies" required>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label class="custom-switch">
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" required>
                                <span class="custom-switch-checkmark"></span>
                                <span class="custom-switch-description">I accept the <a href="/terms" target="_blank">Terms & Conditions</a>, <a href="/privacy" target="_blank">Privacy Policy</a></span>
                            </label>
                        </div>
                        <button type="submit" class="cta-btn cta-btn-acc-action">Sign up</button>
                    </form>
{{--                    <p class="have-account-login">Already have an account? <a href="login.php">Login</a></p>--}}
                </div>
            </div>
        </div>
    </div>

@endsection
