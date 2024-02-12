<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Completion</title>
    <link href="{{asset('panel/css/bootstrap.min.css')}}" rel="stylesheet" />
    {{--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">--}}

    <style>
        * {
            margin: 0;
            padding: 0;
            /*font-family: 'Poppins', sans-serif;*/
        }
        /*.content{*/
        /*    !*height: auto;*!*/
        /*    padding-bottom: 0;*/
        /*    padding-top: 40px;*/
        /*    padding-right: 80px;*/
        /*    padding-left: 80px;a*/
        /*}*/

        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;

            margin: 0 auto;
            /*text-align: center;*/
        }

        .certificate {
            position: relative;
            {{--background: url("{{asset('/panel/certify-bggg.png')}}");--}}
            background-position: bottom right;
            background-size: contain;
            background-repeat: no-repeat;
            padding: 0 !important;
            margin: 0 !important;
            height: 100%;

            /*border: 1px solid #ccc;*/
            /*padding: 20px;*/
        }

        .box{
            position: relative;
            height: 170px;
            width: 200px;
            background: url("{{asset('/panel/certify-badge.png')}}");
            background-position: bottom right;
            background-size: contain;
            background-repeat: no-repeat;
        }
        .certificate .img-bottom{
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40%;
            /*z-index: -1;*/
        }
        .certificate .img-top{
            position: absolute;
            top: 0;
            right: 0;
            width: 50%;
            /*z-index: -1;*/
        }
        .title img {
            width: 160px;
        }

        /*.content {*/
        /*    font-size: 18px;*/
        /*    margin-top: 20px;*/
        /*}*/
        .stamp-section h1 {
            font-weight: 800;
            font-size: 55px;
            color: #0fba8f;
        }
        .stamp-section h4 {
            font-weight: 700;
            font-size: 18px;
            text-transform: uppercase;
        }
        .info-section h1 {
            font-weight: 800;
            font-size: 35px;
        }
        .info-section p{
            font-size: 12px;
        }
        .fs-15{
            font-size: 15px;
            font-weight: 700 !important;
        }
        .box div{
            position: absolute;
            top: 25%;
            left: 55%;
            font-size: 30px;
            text-align: center;
            font-weight: 900;
        }

        @font-face {
            font-family: 'Croissant One';
            font-weight: normal;
            font-style: normal;
            font-variant: normal;
            src: url("fonts/GreatVibes-Regular.ttf") format('truetype');
        }
        @font-face {
            font-family: 'UnB_Pro_Bold';
            font-weight: normal;
            font-style: normal;
            font-variant: normal;
            src: url("fonts/UnB_Pro_Bold.otf") format('truetype');
        }
        @font-face {
            font-family: 'UnB_Pro_Regular';
            font-weight: normal;
            font-style: normal;
            font-variant: normal;
            src: url("fonts/UnB_Pro_Regular.otf") format('truetype');
        }
        @font-face {
            font-family: 'worksans';
            font-weight: normal;
            font-style: normal;
            font-variant: normal;
            src: url("fonts/worksans.ttf") format('truetype');
        }
        @font-face {
            font-family: 'poppins-bold';
            font-style: normal;
            font-variant: normal;
            src: url("fonts/Poppins-Bold.ttf") format('truetype');
        }
        @font-face {
            font-family: 'poppins-regular';
            font-style: normal;
            font-variant: normal;
            src: url("fonts/Poppins-Regular.ttf") format('truetype');
        }
        .poppins-bold{
            font-family: 'poppins-bold', sans-serif;

        }
        .poppins-regular{
            font-family: 'poppins-regular', sans-serif;

        }
        .heading-c {
            font-family: 'Croissant One', sans-serif;
            font-weight: normal;
            color: #2E915F;
            margin: 0 !important;
        }
        .unb{
            /*font-family: 'UnB_Pro_Bold', sans-serif;*/
            font-size:20px;
            color: #393939;
            letter-spacing: 0.8px;
            /*font-weight:700;*/
        }
        .worksans{
            font-family: 'worksans', sans-serif;
            line-height: 1;
        }
        .sig-color{
            color: #10bb8f !important;
        }
        .fs-50{
            font-size: 60px;
        }
        .fs-40{
            font-size: 50px;
        }
    </style>
</head>
<body>
<div class="certificate">



        <img class="w-100 position-absolute top-0 left-0" src="{{asset('/bg11.png')}}" alt="">
    <p style="color:#393939;font-size: 34px;position:absolute;top: 26%;right:0%;width: 61%;text-align: center;" class="date poppins-bold text-uppercase">
        {{$result}}
    </p>
        <div style="top: 23%;left: 13.5%" class="container position-absolute">
                <div class=" text-start">
                    <p style=" line-height: 0.7;"  class="poppins-bold fs-50 sig-color m-0" >{{getLangValue('pdf_certificate.iq_certificate')}}</p>
                    <p  style=" line-height: 0.7;"  class="poppins-bold unb text-uppercase m-0" style="text-transform:uppercase">{{getLangValue('pdf_certificate.based_on_your_iq_performance')}}</p>
                <p style="color:#393939;font-size: 14px;margin-top: 8%;" class="poppins-regular"style="text-transform:uppercase">{{getLangValue('pdf_certificate.this_certificate_is_presented_to')}}</p>
                    <p style="color:#393939;font-size: 40px;margin-bottom: 5%;line-height: 0.4;" class="poppins-bold text-uppercase">{{$name}}</p>
               <p style="color:#393939;font-size: 14px;line-height: 0.7;" class="poppins-bold">{{getLangValue('pdf_certificate.sucessfull_title')}}</p>
                <p style="color:#393939;font-size: 12px;line-height: 0.7;"  class="poppins-regular">
                    {{getLangValue('pdf_certificate.desc_line_1')}}
                    <br>
                    {{getLangValue('pdf_certificate.desc_line_2')}}
                    <br>
                    {{getLangValue('pdf_certificate.desc_line_3')}}
                    <br>
                    {{getLangValue('pdf_certificate.desc_line_4')}}                    
                </p>

                </div>
        </div>

    <p style="left: 13.5%;color:#393939;font-size: 13px;position:absolute;bottom: 16%;width: 42%;" class="date poppins-regular ">
        Certificate Serial Number: {{$unique}}
    </p>
    <p style="color:#393939;font-size: 14px;position:absolute;bottom: 8%;width: 42%;text-align: center;" class="date poppins-bold text-uppercase">
        {{date("F d, Y", strtotime($date))}}
    </p>

    
{{--    <img class="img-bottom" src="{{asset('/panel/certify.png')}}" alt="">--}}
{{--    <img class="img-top" src="{{asset('/panel/certify-front.png')}}" alt="">--}}


{{--    <div class="content">--}}

{{--        <div class="container pb-4">--}}
{{--            <div class="d-table">--}}
{{--                <div class="d-table-cell w-75 text-start">--}}
{{--                    <div class="title text-start"><img src="{{asset('/panel/img/logo.png')}}" alt=""></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="container stamp-section ">--}}
{{--            <div class="d-table w-100">--}}
{{--                <div class="d-table-cell w-50 text-start">--}}
{{--                    <h1>IQ Certificate</h1>--}}
{{--                    <h4>based on your IQ Performance</h4>--}}
{{--                </div>--}}
{{--                <div class="d-table-cell w-50">--}}
{{--                    <div class="box">--}}
{{--                        <div class="m-auto">--}}
{{--                            {{$result}}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="container info-section">--}}
{{--            <div class="d-table">--}}
{{--                <div class="d-table-cell w-75 text-start">--}}
{{--                    <h6 class="text-uppercase">this certificate is presented to</h6>--}}
{{--                    <h1 class="text-uppercase">{{$name}}</h1>--}}

{{--                    <div>--}}
{{--                        <h6 class="fs-15 fw-700">you have successfully completed the IQ Certify Test</h6>--}}
{{--                        <p>--}}
{{--                            This intelligence test measures your cognitive and mental--}}
{{--                            abilities with different questions that measure your--}}
{{--                            visuospatial perspective, pattern reasoning and numerical--}}
{{--                            reasoning of mathematical patterns. Based on a complex--}}
{{--                            evaluation system--}}
{{--                            we can obtain your level of intelligence, better known as IQ.--}}
{{--                        </p>--}}
{{--                        <p class="mt-5">--}}
{{--                            Certificate Serial Number: {{$unique}}--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


{{--        <div class="container pb-4">--}}
{{--            <div class="d-table w-100">--}}
{{--                <div class="d-table-cell w-50 text-start">--}}
{{--                    <div class="title text-start">--}}
{{--                        <h6 class="fw-bold text-uppercase">--}}
{{--                            {{date("F d, Y", strtotime($date))}}--}}
{{--                        </h6>--}}
{{--                        --}}{{--                        <img src="{{asset('/panel/certify-signature.png')}}" alt="">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="d-table-cell w-50 text-end">--}}
{{--                    <div class="title text-end"><img src="{{asset('/panel/certify-signature.png')}}" alt=""></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
</body>
</html>
