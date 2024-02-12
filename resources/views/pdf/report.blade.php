<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Completion</title>
    <link href="{{asset('panel/css/bootstrap.min.css')}}" rel="stylesheet" />
    {{--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">--}}
    <style>
        /*@import url('https://fonts.googleapis.com/css2?family=Work+Sans&display=swap');*/

        .text-dark{
            color: #262424  !important;
        }

        * {
            margin: 0;
            padding: 0;
        }
        .content{
            /*height: auto;*/
            padding-bottom: 0;
            padding-top: 20px;
            padding-right: 80px;
            padding-left: 80px;
        }

        body {
            font-family: Arial, sans-serif;
        }

        li{
            margin: 0;
        }
        .certificate {
            position: relative;
            background: url("{{asset('/panel/result/certify-Background-pdf.jpg')}}");
            background-position:center center;
            background-size: cover;
            background-repeat: no-repeat;
            padding: 0 !important;
            margin: 0 !important;
            height: 100%;
        }

        .designleftside {
            height: 100%;
            width: 300px;
            position: absolute;
            top: 0;
            left: -50px;
        }

        .badgedesign{
            height: 300px;
            width: auto;
            position: absolute;
            top: 0;
            right: 80px;
        }

        .signaturedesign{
            width: 120px;
            position: absolute;
            bottom: 70px;
            right: 170px;
        }

        .title img {
            width: 200px;
            text-align: center;
        }

        .stamp-section h1 {
            font-weight: 800;
            font-size: 45px;
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

        {{--@font-face {--}}
        {{--    font-family: 'customFont';--}}
        {{--    src: url({{ asset("fonts/GreatVibes-Regular.ttf") }}) format("truetype");--}}
        {{--}--}}
        {{--.custom {--}}
        {{--    font-family: 'customFont', sans-serif !important;--}}
        {{--}--}}


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
        /*UnB_Pro_Regular*/
        .heading-c {
            font-family: 'Croissant One', sans-serif;
            font-weight: normal;
            color: #2E915F;
            margin: 0 !important;
        }
        .unb{
            font-family: 'UnB_Pro_Bold', sans-serif;
            font-size:36px;
            /*font-weight:700;*/
        }

        .unb.s{
            font-family: 'UnB_Pro_Bold', sans-serif !important;
            font-weight: normal !important;
            padding-top:10px;
        }
        .unb.regular{
            font-family: 'UnB_Pro_Regular', sans-serif;
            font-weight: 400;

        }
        .worksans{
            font-family: 'worksans', sans-serif;
            line-height: 1;
        }
        .stamp-section h3{
            font-size: 22px;
            color: #2E915F;

        }
        l-s-2{
            letter-spacing: 2px;
        }
        l-s-1-5{
            letter-spacing: 1.5px;
        }
    </style>

</head>
<body>
@php
    $points = $result; // Replace this with the actual points value
    if ($points >= 130) {
    $resultlevel = "Exceptional";
    }
    elseif ($points >= 116 && $points <= 130) {
        $resultlevel = "High";
    } elseif ($points >= 106 && $points <= 115) {
           $resultlevel = "Above Average";
    } elseif ($points >= 95 && $points <= 105) {
       $resultlevel = "Average";
    } elseif ($points >= 70 && $points <= 94) {
        $resultlevel = "Below Average";
    } elseif ($points >= -70 && $points <= 0) {
        $resultlevel = "Low";
    } else {
        $resultlevel = "Invalid points range"; // This will be the default if none of the conditions are met
    }




    $visionpoints = App\Helpers\Results::GetPartial($id,'vision');

      if ($visionpoints >= 130) {
    $visionresultlevel = "Exceptional";
    }
    elseif ($visionpoints >= 116 && $visionpoints <= 130) {
        $visionresultlevel = "High";
    } elseif ($visionpoints >= 106 && $visionpoints <= 115) {
           $visionresultlevel = "Above Average";
    } elseif ($visionpoints >= 95 && $visionpoints <= 105) {
       $visionresultlevel = "Average";
    } elseif ($visionpoints >= 70 && $visionpoints <= 94) {
        $visionresultlevel = "Below Average";
    } elseif ($visionpoints >= -70 && $visionpoints <= 0) {
        $visionresultlevel = "Low";
    } else {
        $visionresultlevel = "Invalid points range"; // This will be the default if none of the conditions are met
    }







     $numericpoints = App\Helpers\Results::GetPartial($id,'numeric');

       if ($numericpoints >= 130) {
    $numericresultlevel = "Exceptional";
    }
    elseif ($numericpoints >= 116 && $numericpoints <= 130) {
        $numericresultlevel = "High";
    } elseif ($numericpoints >= 106 && $numericpoints <= 115) {
           $numericresultlevel = "Above Average";
    } elseif ($numericpoints >= 95 && $numericpoints <= 105) {
       $numericresultlevel = "Average";
    } elseif ($numericpoints >= 70 && $numericpoints <= 94) {
        $numericresultlevel = "Below Average";
    } elseif ($numericpoints >= -70 && $numericpoints <= 0) {
        $numericresultlevel = "Low";
    } else {
        $numericresultlevel = "Invalid points range"; // This will be the default if none of the conditions are met
    }










     $sequencepoints = App\Helpers\Results::GetPartial($id,'numeric');

         if ($sequencepoints >= 130) {
    $sequenceresultlevel = "Exceptional";
    }
    elseif ($sequencepoints >= 116 && $sequencepoints <= 130) {
        $sequenceresultlevel = "High";
    } elseif ($sequencepoints >= 106 && $sequencepoints <= 115) {
           $sequenceresultlevel = "Above Average";
    } elseif ($sequencepoints >= 95 && $sequencepoints <= 105) {
       $sequenceresultlevel = "Average";
    } elseif ($sequencepoints >= 70 && $sequencepoints <= 94) {
        $sequenceresultlevel = "Below Average";
    } elseif ($sequencepoints >= -70 && $sequencepoints <= 0) {
        $sequenceresultlevel = "Low";
    } else {
        $sequenceresultlevel = "Invalid points range"; // This will be the default if none of the conditions are met
    }


@endphp
<div class="certificate pg-1">
    <img class="designleftside" src="{{asset('/panel/result/certify-side-design.png')}}">
    <img class="badgedesign" src="{{asset('/panel/result/firstbadge.png')}}">

    <div class="content">

        <div class="container pb-2">
            <div class="d-table w-100">
                <div class="d-table-cell text-start">
                    <div class="title text-center">
                        <img src="{{asset('./panel/result/certify-Logo.png')}}" alt="IQ-Certify">
                    </div>
                </div>
            </div>
        </div>

        <div class="container stamp-section pt-5">
            <div class="d-table w-100">
                <div class="d-table-cell w-100 text-center">
                    <p class="m-auto unb text-dark" style="text-transform: uppercase">iq test report</p>
                    <h3 class="unb regular text-uppercase l-s-2">fluid intelligence skills</h3>
                </div>
            </div>
        </div>

        <div class="container stamp-section pt-4 ">
            <div class="d-table w-100">
                <div class="d-table-cell w-100 text-center">
                    <h4 class="text-dark unb regular fw-bold">Analysis of the IQ report obtained by</h4>
                </div>
            </div>
        </div>

        <div class="container py-0 stamp-section">
            <div class="d-table w-100">
                <div class="d-table-cell w-100 text-center">
                    <p class="heading-c pb-1" style="font-size: 60px; font-family: 'Croissant One', sans-serif;">{{$name}}</p>
                    <p class="w-75 m-auto px-3 worksans" style="font-size: 14px">
                        You have answered all the questions from the IQ Certify intelligence test. Through our answer analysis technology, we obtain the statistics of your fluid intelligence that make up the IQ test result. With this data, you can see a breakdown of your mental skills.
                    </p>
                </div>
            </div>
        </div>

        <div class="container stamp-section p-4  px-5">
            <div class="d-table w-100 px-5">
                <div class="d-table-cell w-50 px-5 mx-5">
                    <h4 style="text-transform: uppercase; font-size: 15px; color: #2f9662; letter-spacing: 2px; font-weight: 400;"
                        class="m-0 p-0 ">analyses included in the report</h4>
                    <ul class=" m-0 worksans p-0" style="line-height: 1.2">
                        <li>Sequential Numerical Reasoning</li>
                        <li>Sequential Pattern Perception</li>
                        <li>Visual Spatial Intelligence</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container stamp-section" style="padding-left: 130px; padding-top: 15px">
            <div class="d-table w-100 px-5">
                <div class="d-table-cell w-100 text-start px-4">
                    <p style="font-size: 16px; color: #2e915f" class="text-start mb-0 unb regular">Date: {{$date->format('M d, Y')}}</p>
                    <p class="w-100 text-start worksans" style="font-size: 14px">
                        This report includes 10 pages with analysis of your fluid intelligence.
                    </p>
                </div>
            </div>
        </div>

    </div>

    <img class="signaturedesign" src="{{asset('/panel/result/signature.png')}}">
</div>



{{--    Page 02    --}}
<div class="certificate pg-2">
    <img class="aboutuspage"
         style="width: 100%; height: 100%;"
         src="{{asset('/panel/result/aboutIqCertifynew.jpg')}}">
</div>
{{--    Page 03    --}}
<div class="certificate pg-3">
    <img class="howisiqcertify"
         style="width: 100%; height: 100%;"
         src="{{asset('/panel/result/howIsIqCertify.jpg')}}">
</div>


{{--    Page 04    --}}
<div class="certificate pg-4">
    <img class="overalliqcertify"
         style="width: 100%; height: 100%;"
         src="{{asset('/panel/result/overallIqCertify.jpg')}}">
    <h2 class="unb s" style="width: 38%;text-align:center;position: absolute; bottom: 42%; left: 0%; font-size: 72px">
        {{$result}}
    </h2>
    <div style="text-align:center;position: absolute; bottom: 17%; left: 0%; font-size: 26px; color: #3f7aa9;width: 38%;">

        <h4 class="unb s"  style="font-size: 26px; color: #2e8b5c" >

            {{--            <h4 style="position: absolute; bottom: 15%; left: 15%; font-size: 26px; color: #2e8b5c">--}}
            {{$resultlevel}}
        </h4>
        </h4>
    </div>


    {{--    Page 05    --}}
    <div class="certificate pg-5">
        <img class="overalliqcertify"
             style="width: 100%; height: 100%;"
             src="{{asset('/panel/result/visualSpatialIntelligence.jpg')}}">

    </div>

    {{--    Page 06    --}}
    <div class="certificate pg-6">
        <img class="overalliqcertify"
             style="width: 100%; height: 100%;"
             src="{{asset('/panel/result/yourPerformace.png')}}">
        <h2 class="unb s" style="width: 38%;text-align:center;position: absolute; bottom: 44%; left: 0%; font-size: 72px">
            {{App\Helpers\Results::GetPartial($id,'vision')}}
        </h2>
        <div style="text-align:center;position: absolute; bottom: 18%; left: 0%; font-size: 26px; color: #3f7aa9;width: 38%;">

            <h4 class="unb s"  style="font-size: 26px; color: #3f7aa9" >
                {{$visionresultlevel}}
            </h4>
        </div>

    </div>


    {{--    Page 07    --}}
    <div class="certificate pg-7">
        <img style="width: 100%; height: 100%;"
             src="{{asset('/panel/result/sequentialNumericalReasoning.png')}}">
    </div>

    {{--    Page 08    --}}
    <div class="certificate pg-8">
        <img style="width: 100%; height: 100%;"
             src="{{asset('/panel/result/sequentialNumericalReasoningGraph.png')}}">
        <h2 class="unb s" style="width: 38%;text-align:center;position: absolute; bottom: 44%; left: 0%; font-size: 72px">
            {{$numericpoints}}
        </h2>
        <div style="text-align:center;position: absolute; bottom: 16%; left: 0%; font-size: 26px; color: #3f7aa9;width: 38%;">
            <h4 class="unb s"  style="font-size: 26px; color: #359665" >

                {{$numericresultlevel}}
            </h4>
        </div>
    </div>


    {{--    Page 09    --}}
    <div class="certificate pg-9">
        <img style="width: 100%; height: 100%;"
             src="{{asset('/panel/result/sppMannual.png')}}">

    </div>

    {{--    Page 10    --}}
    <div class="certificate pg-10">
        <img style="width: 100%; height: 100%;"
             src="{{asset('/panel/result/sppGraph.png')}}">
        <h2 class="unb s" style="width: 38%;text-align:center;position: absolute; bottom: 44%; left: 0%; font-size: 72px">
            {{$sequencepoints}}
        </h2>
        <div style="text-align:center;position: absolute; bottom: 17%; left: 0%; font-size: 26px; color: #3f7aa9;width: 38%;">
            <h4 class="unb s" style="font-size: 26px; color: #bb506e">
                {{$sequenceresultlevel}}
            </h4>
        </div>
    </div>
    {{--    Page 11    --}}
    <div class="certificate pg-11">
        <img style="width: 100%; height: 100%;"
             src="{{asset('/panel/result/finalResult.png')}}">
        <h2 class="unb s" style="width: 38%;text-align:center;position: absolute; bottom: 42%; left: 0%; font-size: 72px">
            {{$result}}
        </h2>
        <div style="text-align:center;position: absolute; bottom: 17%; left: 0%; font-size: 26px; color: #3f7aa9;width: 38%;">

            <h4 class="unb s" style="font-size: 26px; color: #359665">
                {{$resultlevel}}
            </h4>
        </div>

        <span style="position: absolute; bottom: 45.5%; left: 39%;">Visual Spatial Intelligence</span>
        <span style="position: absolute; bottom: 45.5%; right: 12%;width: 25%;text-align:center;">{{$visionresultlevel}}</span>
        <span style="position: absolute; bottom: 45.5%; right: 0%;width: 20%;text-align: center;">{{$visionpoints}}</span>

        <span style="position: absolute; bottom: 38%; left: 39%;">Sequential Numerical Score</span>
        <span style="position: absolute; bottom: 38%; right: 12%;width: 25%;text-align:center;">{{$numericresultlevel}}</span>
        <span style="position: absolute; bottom: 38%; right: 0%;width: 20%;text-align: center;">{{$numericpoints}}</span>

        <span style="position: absolute; bottom: 31%; left: 39%;">Sequential Pattern Perception</span>
        <span style="position: absolute; bottom: 31%; right: 12%;width: 25%;text-align:center;">{{$sequenceresultlevel}}</span>
        <span style="position: absolute; bottom: 31%; right: 0%;width: 20%;text-align: center;">{{$sequencepoints}}</span>



    </div>

</div>
</body>
</html>
