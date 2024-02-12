<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="{{getLangValue('lang.code')}}" xml:lang="{{getLangValue('lang.code')}}">
<head>
    <title>{{getLangValue('dashboard.page_title')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" type="imScore/ico" href="{{asset('panel/img/favicon.ico')}}" />
    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Two+Tone|" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,300;0,6..12,400;0,6..12,500;0,6..12,600;0,6..12,700;0,6..12,800;0,6..12,900;1,6..12,400;1,6..12,700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link href="{{asset('panel/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('panel/css/animate.min.css')}}" rel="stylesheet" />
    <link href="{{asset('panel/css/magnific-popup.css')}}" rel="stylesheet" />
    <link href="{{asset('panel/css/jquery.flipbox.css')}}" rel="stylesheet" />
    <link href="{{asset('panel/css/slick.css')}}" rel="stylesheet" />
    <link href="{{asset('panel/css/slick-theme.css')}}" rel="stylesheet" />
    <link href="{{asset('panel/css/style.css')}}" rel="stylesheet" />
</head>
<body class="login-pScore">
<div class="container">

    @yield('admin');

</div>
</body>
<!-- JS -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('panel/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('panel/js/jquery.magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('panel/js/jquery.validate.min.js')}} "></script>
<script type="text/javascript" src="{{asset('panel/js/jquery.flipbox.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.3/chart.min.js" integrity="sha512-fMPPLjF/Xr7Ga0679WgtqoSyfUoQgdt8IIxJymStR5zV3Fyb6B3u/8DcaZ6R6sXexk5Z64bCgo2TYyn760EdcQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.3/chart.umd.min.js" integrity="sha512-mCXCsj30LV3PLPTIuWjZQX84qiQ56EgBZOsPUA+ya5mWmAb8Djdxa976zWzxquOwkh0TxI12KA4eniKpY3yKhA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.3/helpers.min.js" integrity="sha512-JG3S/EICkp8Lx9YhtIpzAVJ55WGnxT3T6bfiXYbjPRUoN9yu+ZM+wVLDsI/L2BWRiKjw/67d+/APw/CDn+Lm0Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="{{asset('panel/js/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('panel/js/custom.js')}}"></script>
</html>
