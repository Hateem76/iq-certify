<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="{{getLangValue('lang.code')}}" xml:lang="{{getLangValue('lang.code')}}">
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="@yield('desc')" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" type="image/ico" href="{{asset('panel/img/favicon.ico')}}" />
    <!-- Open Graph Meta Tags-->
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('desc')" />
    <meta property="og:type" content="IQ Certify" />
    <meta property="og:url" content="https://www.iq-certify.com/" />
    <meta property="og:image" content="https://iq-certify.com/img/hero-img.png" />
    <!-- Twitter Meta -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="IQ Certify" />
    <meta name="twitter:title" content="@yield('title')" />
    <meta name="twitter:description" content="@yield('desc')" />
    <meta name="twitter:image" content="https://iq-certify.com/img/hero-img.png" />
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Two+Tone|" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,300;0,6..12,400;0,6..12,500;0,6..12,600;0,6..12,700;0,6..12,800;0,6..12,900;1,6..12,400;1,6..12,700&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link href="{{asset('panel/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('panel/css/animate.min.css')}}" rel="stylesheet" />
    <link href="{{asset('panel/css/magnific-popup.css')}}" rel="stylesheet" />
    <link href="{{asset('panel/css/jquery.flipbox.css')}}" rel="stylesheet" />
    <link href="{{asset('panel/css/style.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
@if (\Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ App\Helpers\Translations::Translations('Success!','message')}}</strong> {!! \Session::get('success') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (\Session::has('wrong'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ App\Helpers\Translations::Translations('Error!','message')}}</strong> {!! \Session::get('wrong') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (\Session::has('warning'))
    <div class="alert alert-warning alert-dismissible fade show rounded-0"  role="alert">
        <strong>{{ App\Helpers\Translations::Translations('Warning!','message')}}</strong> {!! \Session::get('warning') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<header>
    <div class="container">
        <div class="header-content">
            <div class="logo-wrapper">
                <a href="{{url('/')}}"><img src="{{asset('panel/img/logo.png')}}" class="img-fluid logo-img" alt="Website Logo" /></a>
            </div>
            <span class="toggle-button">
				 <div class="menu-bar menu-bar-top"></div>
				 <div class="menu-bar menu-bar-middle"></div>
				 <div class="menu-bar menu-bar-bottom"></div>
			</span>
            <div class="nav-wrapper">
                <h4 class="mobile-nav-header">{{getLangValue('header.navigation')}}</h4>
                <div class="nav-content">
                    <ul class="nav">
                        <li class="nav-button"><a href="{{url('/')}}"> {{getLangValue('header.home')}}</a></li>
                        <li class="nav-button"><a href="{{url('/faq')}}">{{getLangValue('header.faq')}}</a></li>
                        <li class="nav-button"><a href="{{url('/about')}}">{{getLangValue('header.about')}}</a></li>
                        <li class="nav-button"><a href="{{url('/contact')}}">{{getLangValue('header.contact')}}</a></li>
                        <li class="nav-button">
                            @if (Route::has('login'))

                                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                    @auth
                                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{getLangValue('header.my_account_dashboard')}}</a>
                                    @else
                                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{getLangValue('header.log_in')}}</a>
                                    @endauth
                                </div>
                            @endif
                        </li>

                        <li class="nav-button"><a id="auth-trigger" href="{{url('/quizz')}}">{{getLangValue('header.start_iq_test_button')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>



{{--        <script>--}}
{{--            document.getElementById('selectRedirect').addEventListener('change', function() {--}}
{{--            var selectedValue = this.value;--}}
{{--            if (selectedValue) {--}}
{{--            window.location.href = selectedValue; // Redirect to the selected URL--}}
{{--        }--}}
{{--        });--}}
{{--    </script>--}}
