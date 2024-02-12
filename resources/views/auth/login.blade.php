@extends('layouts.app')
@section('title'){{getLangValue('login.page_title')}}@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card border-0 rounded-3 ">
                    <div class="card-header bg-white border-0">
                        <div class="text-center">
                            <div class="loginHeader">
                                <a class="header-brand" href="{{url('/')}}">
                                    <img src="{{asset('panel/img/logo.png')}}" class="img-fluid logo-img" alt="Website Logo" />
                                </a>
                                <h4 class="signup-title">
                                    {{getLangValue('login.welcome_back')}}
                                </h4>
                                <span class="signup-intro">
                                    {{getLangValue('login.sign_in_to_access_dashboard')}}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <img src="{{asset('panel/img/icons/user-rounded.svg')}}" class="img-fluid svg-icon icon-green form-input-icon" alt="User" />
                                        <input id="email" placeholder="{{getLangValue('login.email_address')}}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        <span class="help-block">
                                         @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                         @enderror
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <img src="{{asset('panel/img/icons/key.svg')}}" class="img-fluid svg-icon icon-green form-input-icon" alt="Checkmark" />
                                        <input id="password" type="password" placeholder="{{getLangValue('login.password')}}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        <span class="help-block">
                                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label " for="remember">
                                            {{getLangValue('login.remember_me')}}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check p-0">
                                        @if (Route::has('password.request'))
                                            <a class="btn text-dark text-signature" href="{{ route('password.request') }}">
                                                {{getLangValue('login.forgot_your_password')}}
                                            </a>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="cta-btn cta-btn-acc-action">
                                        {{getLangValue('login.login')}}

                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
