@extends('frontend.layouts.main')
@section('title'){{$result->user->name}} {{getLangValue('test_result.page_title')}} {{\App\Helpers\Results::Get($result->id,'total')}} | IQ Certify @endsection
@section('desc') {{$result->user->name}}{{getLangValue('test_result.page_desc')}} {{getLangValue('test_result.page_')}}@endsection
@section('main-container')
<?php

$php_protocolo = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https://" : "http://";
$php_dominio = $_SERVER['HTTP_HOST'];
$php_uri = $_SERVER['REQUEST_URI'];

$full_url = $php_protocolo . $php_dominio . $php_uri;
?>
    <?php
    $link = url('/test-result',$key);
    $alphabets = [
        1=>'A',
        2=>'B',
        3=>'C',
        4=>'D',
        5=>'E',
        6=>'F'
    ]
    ?>

    <style>
        .modal-content.alert.alert-success {
            background: #d1e7dd !important;
            color: #0f5132 !important;
        }
        .paymenttab{
            /*display: none;*/
        }
        .error.hide {
            display: none;
        }
.apendload{
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 9999;
}
        .preloader, .preloader-cert {
            display: flex;
            gap: 5px;
            align-items: center;
            background: #00784c;
            padding: 10px 23px;
            border-radius: 4px;
            color: white;
            z-index: 9999;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            font-size: 14px;
        }

@media screen and (min-width: 1024px) {
    header{
        display: none;
    }
}        
    </style>
   <div class="apendload">

   </div>
    <div class="container">
        <!-- Button trigger modal -->
        <!-- Button trigger modal -->
        @if (session()->get('popup') == true)
        @else
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content alert alert-success">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">
                                {{getLangValue('test_result.welcome_iq_certify')}}
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>
                                {{getLangValue('test_result.reffered_text_1')}}
                                {{getLangValue('test_result.reffered_text_2')}}

                            </p>

                            <p>
                                {{getLangValue('test_result.reffered_text_check_your_iq')}}

                            </p>

                                <?php             $code = Session::get('lang'); ?>
                            <a class="cta-btn cta-btn-small" href="{{url($code.'/quizz')}}?ref={{$result->unique_key}}">{{getLangValue('test_result.button_make_new_text')}}</a>
                        </div>
                    </div>
                </div>    </div>
        @endif

        <div class="additional-info-wrapper">
            <div class="additional-info-inner">
                <div class="dashboardHeader">
                    <a class="header-brand" href="index">
                        <img src="{{asset('panel/img/logo.png')}}" class="img-fluid logo-img" alt="Website Logo" />
                    </a>
                    <h4 class="signup-title">{{getLangValue('test_result.your_results')}}</h4>
                    <span class="signup-intro">{{getLangValue('test_result.your_results_desc')}}</span>
                </div>
                <div class="additional-info-content-wrapper">
                    <div class="additional-info-header">
                       {{-- <h2 class="ytr-title">{{$result->quiz->title}} {{getLangValue('test_result.results')}}</h2> --}}
                       <h2 class="ytr-title">Has obtenido un IQ de 123</h2> 
                    </div>
                    <div class="additional-info-panel additional-info-panel-test-results">
                        <div class="test-results-wrapper">
                            <div class="row row-dm">
                                <div class="col-lg-4 col-dp col-m-mb">
                                    <div class="test-results-details-wrapper">
                                        <div class="test-result-star-icon-wrapper">
                                            <img src="{{asset('panel/img/icons/medal-ribbons-star.svg')}}" class="img-fluid icon-green test-result-star-icon" alt="" />
                                            </div>
                                        <img src="{{\App\Helpers\Results::CountryFlag($result->user->country)}}" class="img-fluid trdw-flag" />
                                        <div class="trdw-country">{{$result->user->country}}</div>
                                        <div class="trdw-name">{{$result->user->name}}</div>
                                        <div class="trdw-date">{{date('d.m.Y', strtotime($result->created_at))}}</div>
                                        <div class="trdw-score">

                                            <div class="trdw-score-1">IQ {{\App\Helpers\Results::Get($result->id,'total')}}</div>
                                            <div class="trdw-score-2">{{\App\Helpers\Results::CorrectAnswer($result->id,true)}}</div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-8 col-dp">
                                    <div class="test-results-details-intro">
                                        <div class="standard-content-title-wrapper">
                                            <h2 class="standard-content-title">{{getLangValue('test_result.congratulations')}} <strong>{{$result->user->name}}!</strong></h2>
                                        </div>
                                        <p>{{getLangValue('test_result.text_result_01')}}</p>
                                        <p>{{getLangValue('test_result.text_result_02')}}</p>
                                        <p>{{getLangValue('test_result.text_result_03')}}</p>
                                    </div>

  {{--                                  <ul class="social-share-cta-wrapper"> --}}
  {{--                                      <li class="social-share-cta-item social-share-cta-item-mb"> --}}
  {{--                                          <div class="trdw-cta-wrapper"> --}}
  {{--                                              <button href="{{url('generate-certificate',$key)}}" class="cta-btn cta-btn-big trdw-cta-btn position-relative d-cert"> --}}
  {{--                                                  <span>{{getLangValue('test_result.download_certificate')}}</span> --}}
  {{--                                                  <img src="{{asset('panel/img/icons/file-download.svg')}}" class="img-fluid svg-icon cta-btn-icon icon-white" alt=""> --}}
  {{--                                              </button> --}}
  {{--                                          </div> --}}
  {{--                                      </li> --}}
                {{--            <li class="social-share-cta-item social-share-cta-item-mb"> --}}
                {{--                <div class="trdw-cta-wrapper"> --}}
                {{--                    <a  href="{{url('generate-report',$key)}}" target="_blank" class="cta-btn cta-btn-big trdw-cta-btn"> --}}
                {{--                        <span>{{getLangValue('test_result.view_performance_report')}}</span> --}}
                {{--                        <img src="{{asset('panel/img/icons/rounded-magnifer-zoom-in.svg')}}" class="img-fluid svg-icon cta-btn-icon icon-white" alt=""> --}}
                {{--                    </a> --}}
                {{--                </div> --}}
                {{--            </li> --}}
  {{--                                      <li class="social-share-cta-item social-share-cta-item-mb"> --}}
  {{--                                          <div class="trdw-cta-wrapper"> --}}
  {{--                                              <a  href="{{url('generate-certificate-view',$key)}}" target="_blank" class="cta-btn cta-btn-big trdw-cta-btn"> --}}
  {{--                                                  <span>{{getLangValue('test_result.view_certificate')}}</span> --}}
  {{--                                                  <img src="{{asset('panel/img/icons/rounded-magnifer-zoom-in.svg')}}" class="img-fluid svg-icon cta-btn-icon icon-white" alt=""> --}}
  {{--                                              </a> --}}
  {{--                                          </div> --}}
  {{--                                      </li> --}}
  {{--                                  </ul> --}}



                                    <ul class="social-share-cta-wrapper">
                                        
                                        <li class="social-share-cta-item social-share-cta-item-mb"> 
                                            <div class="trdw-cta-wrapper"> 
                                                <a  href="{{url('generate-certificate',$key)}}" target="_blank" class="cta-btn cta-btn-big trdw-cta-btn"> 
                                                    <span>{{getLangValue('test_result.download_certificate')}}</span> 
                                                    <img src="{{asset('panel/img/icons/certificate.svg')}}" class="img-fluid svg-icon cta-btn-icon icon-white" alt=""> 
                                                </a> 
                                            </div> 
                                        </li>                                         
                                        
                                        <li class="social-share-cta-item social-share-cta-item-mb">
                                            <div class="trdw-cta-wrapper">
                            @if($alreadyreport != null)
                                                <a download href="{{$alreadyreport}}" target="_blank" class="cta-btn cta-btn-big trdw-cta-btn position-relative ">
                                                    <span>{{getLangValue('test_result.download_performance_report')}}</span>
                                                    <img src="{{asset('panel/img/icons/report.svg')}}" class="img-fluid svg-icon cta-btn-icon icon-white" alt="">
                                                </a>
                                                @else
                                                
                                                 <button href="{{url('download-report',$key)}}" target="_blank" class="cta-btn cta-btn-big trdw-cta-btn position-relative d-rep">
                                                    <span>{{getLangValue('test_result.download_performance_report')}}</span>
                                                    <img src="{{asset('panel/img/icons/report.svg')}}" class="img-fluid svg-icon cta-btn-icon icon-white" alt="">
                                                </button>
                                                @endif
                                            </div>
                                        </li>
                                    </ul> 
                                        

                                    
                                    
                                    
                                    <div class="share-results-split-section">
                                        <h3 class="dptc-title">{{getLangValue('test_result.share_your_results')}}</h3>
                                        <p class="share-results-intro-text">{{getLangValue('test_result.share_your_results_text')}}</p>
                                    </div>
                                    <ul class="social-share-cta-wrapper">
                                        <li class="social-share-cta-item social-share-cta-item-mb">
                                            <div class="social-share-cta-item-content facebook-bgcolor">
                                                <div class="sscic-header">
                                                    <div class="sscic-header-left">
                                                        <span class="social-share-cta-text">{{getLangValue('test_result.share_your_results_on')}}</span>
                                                        <span class="social-share-cta-name">Facebook</span>
                                                    </div>
                                                    <div class="sscic-header-right">
                                                        <i class="fab fa-facebook-f"></i>
                                                    </div>
                                                </div>
                                                <div class="social-share-cta-button-wrapper">
                                                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $full_url ?>&quote={{getLangValue('test_result.share_social_message_1')}} {{\App\Helpers\Results::Get($result->id,'total')}}. {{getLangValue('test_result.share_social_message_2')}}" class="social-share-cta-button">
                                                        {{getLangValue('test_result.share_my_result')}}
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="social-share-cta-item social-share-cta-item-mb">
                                            <div class="social-share-cta-item-content whatsapp-bgcolor">
                                                <div class="sscic-header">
                                                    <div class="sscic-header-left">
                                                        <span class="social-share-cta-text">{{getLangValue('test_result.share_your_results_on')}}</span>
                                                        <span class="social-share-cta-name">WhatsApp</span>
                                                    </div>
                                                    <div class="sscic-header-right">
                                                        <i class="fab fa-whatsapp"></i>
                                                    </div>
                                                </div>
                                                <div class="social-share-cta-button-wrapper">
                                                    <a target="_blank" href="whatsapp://send?text={{getLangValue('test_result.share_social_message_1')}} {{\App\Helpers\Results::Get($result->id,'total')}}. {{getLangValue('test_result.share_social_message_2')}} <?php echo $full_url ?>" class="social-share-cta-button">
                                                        {{getLangValue('test_result.share_my_result')}}
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="social-share-cta-item">
                                            <div class="social-share-cta-item-content twitter-bgcolor">
                                                <div class="sscic-header">
                                                    <div class="sscic-header-left">
                                                        <span class="social-share-cta-text">{{getLangValue('test_result.share_your_results_on')}}</span>
                                                        <span class="social-share-cta-name">Twitter</span>
                                                    </div>
                                                    <div class="sscic-header-right">
                                                        <i class="fab fa-twitter"></i>
                                                    </div>
                                                </div>
                                                <div class="social-share-cta-button-wrapper">
                                                    <a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo $full_url ?>&text={{getLangValue('test_result.share_social_message_1')}} {{\App\Helpers\Results::Get($result->id,'total')}}. {{getLangValue('test_result.share_social_message_2')}}" class="social-share-cta-button">
                                                        {{getLangValue('test_result.share_my_result')}}
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="social-share-cta-item">
                                            <div class="social-share-cta-item-content viber-bgcolor">
                                                <div class="sscic-header">
                                                    <div class="sscic-header-left">
                                                        <span class="social-share-cta-text">{{getLangValue('test_result.share_url')}}</span>
                                                        <span class="social-share-cta-name">{{getLangValue('test_result.copy_url')}}</span>
                                                    </div>
                                                    <div class="sscic-header-right">
                                                        <i class="far fa-copy"></i>
                                                    </div>
                                                </div>

                                                <div class="social-share-cta-button-wrapper">
                                                    <a onclick="copyToClipboard()" id="copyButton" class="social-share-cta-button">
                                                        {{getLangValue('test_result.copy_url_button')}}
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <input type="text" style="opacity:0" value="<?php echo $full_url ?>" id="inputField">
                        <div class="test-results-analysis-wrapper">
                            <div class="standard-content-title-wrapper result-details-standard-content-title-wrapper">
                                <h2 class="standard-content-title result-details-standard-content-title">{{getLangValue('test_result.detalied_analysis_of_your_results')}}</h2>
                            </div>
                            <h3 class="dptc-title yra-title">{{getLangValue('test_result.distribution_iq_in_the_world')}}</h3>
                            <div id="worldPopulationChart" class="result-analysis-chart"></div>
                            <div class="result-analysis-chart-description" style="display:none;">
                                <p>You are part of the smartest<span>{{100-\App\Helpers\Results::PercentageAllOver($result->id)}}%</span>in the world.</p>
                                <p>You are smarter than <span>{{\App\Helpers\Results::PercentageAllOver($result->id)}}%</span> of the population.</p>
                            </div>
                            <div class="yra-section">
                                <div class="row row-dm">
                                    <div class="col-lg-6 col-dp col-m-mb">
                                        <h3 class="dptc-title yra-title">
                                            {{getLangValue('test_result.average_iq_by_age')}}
                                        </h3>
                                        <div id="ageChart" class="result-analysis-chart"></div>
                                        <div class="result-analysis-chart-description" style="display:none;">
                                            <p>Usted es parte del <span>{{100-\App\Helpers\Results::PercentageByAge($result->id)}}.00%</span> más inteligente de las personas en su mismo rango etareo ({{$result->user->age}}).</p>
                                            <p>Usted es más inteligente que el <span>
                                                {{\App\Helpers\Results::PercentageByAge($result->id)}}%</span> de las personas en su mismo rango etareo.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-dp">
                                        <h3 class="dptc-title yra-title">{{getLangValue('test_result.average_by_level_of_education')}}</h3>
                                        <div id="educationChart" class="result-analysis-chart"></div>
                                        <div class="result-analysis-chart-description" style="display:none;">
                                            <p>Usted es parte del <span>{{100-\App\Helpers\Results::PercentageByEdu($result->id)}}%</span> más inteligente de las personas con su mismo nivel de estudios (Sin diploma).</p>
                                            <p>Usted es más inteligente que el <span>{{\App\Helpers\Results::PercentageByEdu($result->id)}}%</span> de las personas con su mismo nivel de estudios.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="yra-section">
                                <h3 class="dptc-title yra-title">{{getLangValue('test_result.average_iq_by_field_of_education')}}</h3>
                                <div id="fieldChart" class="result-analysis-chart"></div>
                                <div class="result-analysis-chart-description" style="display:none;">
                                    <p>Usted es parte del <span>{{100-\App\Helpers\Results::PercentageByEduField($result->id)}}%</span> más inteligente de las personas en su misma área de estudio (Escuela primaria / secundaria).</p>
                                    <p>Usted es más inteligente que el <span>{{\App\Helpers\Results::PercentageByEduField($result->id)}}%</span> de las personas en su misma área de estudio.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
function copyToClipboard() {
   
    var copyText = document.getElementById("inputField");
    copyText.select();
    document.execCommand("copy");

    
    var copyButton = document.getElementById("copyButton");
    copyButton.innerHTML = "{{getLangValue('test_result.copied_url_button')}}";
    setTimeout(function() {
        copyButton.innerHTML = "{{getLangValue('test_result.copy_url_button')}}";
    }, 1500);
}
</script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $('.btn-close').on('click',function(){
            $('.modal').remove();

        })
    </script>

    @section('script')
        <script>
            $(document).ready(function () {
                setTimeout(function () {
                    $('#exampleModal').modal('show');
                }, 2000);
            });
        </script>

        <script>
            $(document).ready(function () {
                $('.d-rep').on('click', function () {
                    var key = $(this).data('key');
                    $(this).prop('disabled', true);
                    $(this).append(` <div class="preloader">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            Downloading...
    </div>`);

                    fetch(`{{url('download-report',$key)}}`, {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        responseType: 'blob'
                    })
                        .then(response => response.blob())
                        .then(blob => {
                            $('.preloader:first').remove();
                            $(this).prop('disabled', false);
                            toastr.success('Download successful!');

                            // $('.apendload').html('');

                            // Create a link element and trigger the download
                            var link = document.createElement('a');
                            link.href = window.URL.createObjectURL(blob);
                            link.download = 'report.pdf';
                            document.body.appendChild(link);
                            link.click();
                            document.body.removeChild(link);
                        })
                        .catch(error => {
                            $('#preloader').hide();
                            console.error('Error:', error);
                        });
                });
            });
            $(document).ready(function () {
                $('.d-cert').on('click', function () {
                    var key = $(this).data('key');
                    $(this).prop('disabled', true);
                    $(this).append(` <div class="preloader-cert">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            Downloading...
    </div>`);

                    fetch(`{{url('generate-certificate',$key)}}`, {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        responseType: 'blob'
                    })
                        .then(response => response.blob())
                        .then(blob => {
                            $('.preloader-cert:first').remove();
                            $(this).prop('disabled', false);
                            toastr.success('Download successful!');

                            // $('.apendload').html('');

                            // Create a link element and trigger the download
                            var link = document.createElement('a');
                            link.href = window.URL.createObjectURL(blob);
                            link.download = 'report.pdf';
                            document.body.appendChild(link);
                            link.click();
                            document.body.removeChild(link);
                        })
                        .catch(error => {
                            $('#preloader').hide();
                            console.error('Error:', error);
                        });
                });
            });
        </script>
{{--        <script>--}}

{{--            $(document).ready(function () {--}}
{{--                $('.d-rep').on('click', function () {--}}
{{--                    $('#preloader').show();--}}

{{--                    $.ajax({--}}
{{--                        type: 'GET',--}}
{{--                        url: `{{url('download-report',$key)}}`,--}}
{{--                        success: function () {--}}
{{--                            $('#preloader').hide();--}}
{{--                        }--}}
{{--                    });--}}
{{--                });--}}
{{--            });--}}
{{--        </script>--}}
        <script type="text/javascript">

            //World Population IQ Distribution Chart -- START

            var data = [
                {x:50,y:0.0105},
                {x:51,y:0.0130},
                {x:52,y:0.0162},
                {x:53,y:0.0200},
                {x:54,y:0.0245},
                {x:55,y:0.0300},
                {x:56,y:0.0365},
                {x:57,y:0.0443},
                {x:58,y:0.0535},
                {x:59,y:0.0642},
                {x:60,y:0.0769},
                {x:61,y:0.0916},
                {x:62,y:0.1086},
                {x:63,y:0.1282},
                {x:64,y:0.1507},
                {x:65,y:0.1763},
                {x:66,y:0.2054},
                {x:67,y:0.2382},
                {x:68,y:0.2751},
                {x:69,y:0.3163},
                {x:70,y:0.3620},
                {x:71,y:0.4125},
                {x:72,y:0.4680},
                {x:73,y:0.5286},
                {x:74,y:0.5944},
                {x:75,y:0.6655},
                {x:76,y:0.7417},
                {x:77,y:0.8230},
                {x:78,y:0.9092},
                {x:79,y:1.0001},
                {x:80,y:1.0951},
                {x:81,y:1.1938},
                {x:82,y:1.2957},
                {x:83,y:1.4001},
                {x:84,y:1.5062},
                {x:85,y:1.6132},
                {x:86,y:1.7202},
                {x:87,y:1.8261},
                {x:88,y:1.9301},
                {x:89,y:2.0309},
                {x:90,y:2.1275},
                {x:91,y:2.2189},
                {x:92,y:2.3040},
                {x:93,y:2.3818},
                {x:94,y:2.4514},
                {x:95,y:2.5118},
                {x:96,y:2.5623},
                {x:97,y:2.6024},
                {x:98,y:2.6313},
                {x:99,y:2.6489},
                {x:100,y:2.6547},
                {x:101,y:2.6489},
                {x:102,y:2.6313},
                {x:103,y:2.6024},
                {x:104,y:2.5623},
                {x:105,y:2.5118},
                {x:106,y:2.4514},
                {x:107,y:2.3818},
                {x:108,y:2.3040},
                {x:109,y:2.2189},
                {x:110,y:2.1275},
                {x:111,y:2.0309},
                {x:112,y:1.9301},
                {x:113,y:1.8261},
                {x:114,y:1.7202},
                {x:115,y:1.6132},
                {x:116,y:1.5062},
                {x:117,y:1.4001},
                {x:118,y:1.2957},
                {x:119,y:1.1938},
                {x:120,y:1.0951},
                {x:121,y:1.0001},
                {x:122,y:0.9092},
                {x:123,y:0.8230},
                {x:124,y:0.7417},
                {x:125,y:0.6655},
                {x:126,y:0.5944},
                {x:127,y:0.5286},
                {x:128,y:0.4680},
                {x:129,y:0.4125},
                {x:130,y:0.3620},
                {x:131,y:0.3163},
                {x:132,y:0.2751},
                {x:133,y:0.2382},
                {x:134,y:0.2054},
                {x:135,y:0.1763},
                {x:136,y:0.1507},
                {x:137,y:0.1282},
                {x:138,y:0.1086},
                {x:139,y:0.0916},
                {x:140,y:0.0769},
                {x:141,y:0.0642},
                {x:142,y:0.0535},
                {x:143,y:0.0443},
                {x:144,y:0.0365},
                {x:145,y:0.0300},
                {x:146,y:0.0245},
                {x:147,y:0.0200},
                {x:148,y:0.0162},
                {x:149,y:0.0130},
                {x:150,y:0.0105}
            ];

            // Dynamically add a color to one of the data points (e.g., the one with x = 129)
            var colorIndex = data.findIndex(item => item.x === {{\App\Helpers\Results::get($result->id,'total')}});

            if (colorIndex !== -1) {
                // Add the fillColor property to the selected data point
                data[colorIndex].fillColor = '#3472ff';
            }



            var worldPopulationOptions = {
                series: [{
                    name: '{{getLangValue('test_result.average_iq')}}',
                    data: data
                }],
                yaxis: {
                    labels: {
                        formatter: function (value) {
                            return value + "%";
                        }
                    },
                },
                xaxis: {
                    type: 'numeric',
                    labels: {
                        formatter: function (value) {
                            esign = '';
                            if (value == 50) {
                                esign = '-';
                            } else if (value == 150) {
                                esign = '+';
                            }
                            return esign + value + " IQ";
                        }
                    },
                },
                chart: {
                    height: 500,
                    type: 'bar'
                },
                plotOptions: {
                    bar: {
                        borderRadius: 3,
                        columnWidth: '80%'
                    }
                },
                colors: ['#00784c'],
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'dark',
                        type: "vertical",
                        shadeIntensity: 0.15,
                        gradientToColors: undefined, // optional, if not defined - uses the shades of same color in series
                        inverseColors: true,
                        opacityFrom: 1,
                        opacityTo: 1,
                        stops: [0, 50, 100],
                        colorStops: []
                    }
                },
                dataLabels: {
                    enabled: false
                },
                legend: {
                    show: true,
                    showForSingleSeries: true,
                    showForNullSeries: true,
                    showForZeroSeries: true,
                    position: 'bottom',
                    horizontalAlign: 'center',
                    floating: false,
                    fontSize: '14px',
                    fontFamily: 'Nunito Sans',
                    fontWeight: 700,
                    formatter: undefined,
                    inverseOrder: false,
                    width: undefined,
                    height: undefined,
                    tooltipHoverFormatter: undefined,
                    customLegendItems: [],
                    offsetX: 0,
                    offsetY: 10,
                    labels: {
                        colors: undefined,
                        useSeriesColors: false
                    },
                    markers: {
                        width: 12,
                        height: 12,
                        strokeWidth: 0,
                        strokeColor: '#fff',
                        fillColors: undefined,
                        radius: 12,
                        customHTML: undefined,
                        onClick: undefined,
                        offsetX: 0,
                        offsetY: 0
                    }
                },
                responsive: [{
                    breakpoint: 1000,
                    options: {
                        chart: {
                            height: 300,
                            type: 'bar'
                        }
                    }
                }]
            }

            var worldPopulationChart = new ApexCharts(document.querySelector("#worldPopulationChart"), worldPopulationOptions);

            worldPopulationChart.render();
            worldPopulationChart.addXaxisAnnotation({
                x: {{\App\Helpers\Results::get($result->id,'total')}},
                label: {
                    text: '{{getLangValue('test_result.your_iq_score')}}: {{\App\Helpers\Results::get($result->id,'total')}}',
                    style: {
                        background: '#00784c',
                        color: '#fff',
                        fontSize: '12px',
                        fontWeight: 700,
                        fontFamily: 'Nunito Sans',
                        cssClass: 'apexcharts-xaxis-annotation-label',
                    },
                },
            })
            //World Population IQ Distribution Chart -- END

            //Age IQ Distribution Chart -- START
            var ageOptions = {
                series: [{
                    name: '{{getLangValue('test_result.average_iq')}}',
                    data: [{
                        x: '- 18 {{getLangValue('test_result.age')}}',
                        y: 100
                    }, {
                        x: '18-39 {{getLangValue('test_result.age')}}',
                        y: 106
                    }, {
                        x: '40-59 {{getLangValue('test_result.age')}}',
                        y: 103
                    }, {
                        x: '60-79 {{getLangValue('test_result.age')}}',
                        y: 97
                    }, {
                        x: '+ 80 {{getLangValue('test_result.age')}}',
                        y: 93
                    }, {
                        x: '{{getLangValue('test_result.you')}}',
                        y: {{\App\Helpers\Results::get($result->id,'total')}},
                        fillColor: '#3472ff'
                    }
                    ]
                }],
                yaxis: {
                    labels: {
                        formatter: function (value) {
                            return value + " IQ";
                        }
                    },
                },
                chart: {
                    height: 500,
                    type: 'bar'
                },
                plotOptions: {
                    bar: {
                        borderRadius: 3,
                        columnWidth: '80%'
                    }
                },
                colors: ['#00784c'],
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'dark',
                        type: "vertical",
                        shadeIntensity: 0.15,
                        gradientToColors: undefined, // optional, if not defined - uses the shades of same color in series
                        inverseColors: true,
                        opacityFrom: 1,
                        opacityTo: 1,
                        stops: [0, 50, 100],
                        colorStops: []
                    }
                },
                dataLabels: {
                    enabled: true,
                    style: {
                        fontSize: '12px',
                        fontWeight: 'bold',
                        fontFamily: 'Nunito Sans, Helvetica, sans-serif'
                    }
                },
                legend: {
                    show: true,
                    showForSingleSeries: true,
                    showForNullSeries: true,
                    showForZeroSeries: true,
                    position: 'bottom',
                    horizontalAlign: 'center',
                    floating: false,
                    fontSize: '14px',
                    fontFamily: 'Nunito Sans',
                    fontWeight: 700,
                    formatter: undefined,
                    inverseOrder: false,
                    width: undefined,
                    height: undefined,
                    tooltipHoverFormatter: undefined,
                    customLegendItems: [],
                    offsetX: 0,
                    offsetY: 10,
                    labels: {
                        colors: undefined,
                        useSeriesColors: false
                    },
                    markers: {
                        width: 12,
                        height: 12,
                        strokeWidth: 0,
                        strokeColor: '#fff',
                        fillColors: undefined,
                        radius: 12,
                        customHTML: undefined,
                        onClick: undefined,
                        offsetX: 0,
                        offsetY: 0
                    }
                }
            }

            var ageChart = new ApexCharts(document.querySelector("#ageChart"), ageOptions);

            ageChart.render();
            //Age IQ Distribution Chart -- END

            //Education IQ Distribution Chart -- START
            var educationOptions = {
                series: [{
                    name: '{{getLangValue('test_result.average_iq')}}',
                    data: [{
                        x: '{{getLangValue('study_levels.no_studies')}}',
                        y: 94
                    },{
                        x: '{{getLangValue('study_levels.primary_education')}}',
                        y: 98
                    },{
                        x: '{{getLangValue('study_levels.secondary_education')}}',
                        y: 101
                    }, {
                        x: '{{getLangValue('study_levels.high_school')}}',
                        y: 103
                    }, {
                        x: '{{getLangValue('study_levels.university_studies')}}',
                        y: 106
                    }, {
                        x: '{{getLangValue('test_result.you')}}',
                        y: {{\App\Helpers\Results::get($result->id,'total')}},
                        fillColor: '#3472ff'
                    }
                    ]
                }],
                yaxis: {
                    labels: {
                        formatter: function (value) {
                            return value + " IQ";
                        }
                    },
                },
                chart: {
                    height: 500,
                    type: 'bar'
                },
                plotOptions: {
                    bar: {
                        borderRadius: 3,
                        columnWidth: '80%'
                    }
                },
                colors: ['#00784c'],
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'dark',
                        type: "vertical",
                        shadeIntensity: 0.15,
                        gradientToColors: undefined, // optional, if not defined - uses the shades of same color in series
                        inverseColors: true,
                        opacityFrom: 1,
                        opacityTo: 1,
                        stops: [0, 50, 100],
                        colorStops: []
                    }
                },
                dataLabels: {
                    enabled: true,
                    style: {
                        fontSize: '12px',
                        fontWeight: 'bold',
                        fontFamily: 'Nunito Sans, Helvetica, sans-serif'
                    }
                },
                legend: {
                    show: true,
                    showForSingleSeries: true,
                    showForNullSeries: true,
                    showForZeroSeries: true,
                    position: 'bottom',
                    horizontalAlign: 'center',
                    floating: false,
                    fontSize: '14px',
                    fontFamily: 'Nunito Sans',
                    fontWeight: 700,
                    formatter: undefined,
                    inverseOrder: false,
                    width: undefined,
                    height: undefined,
                    tooltipHoverFormatter: undefined,
                    customLegendItems: [],
                    offsetX: 0,
                    offsetY: 10,
                    labels: {
                        colors: undefined,
                        useSeriesColors: false
                    },
                    markers: {
                        width: 12,
                        height: 12,
                        strokeWidth: 0,
                        strokeColor: '#fff',
                        fillColors: undefined,
                        radius: 12,
                        customHTML: undefined,
                        onClick: undefined,
                        offsetX: 0,
                        offsetY: 0
                    }
                }
            }

            var educationChart = new ApexCharts(document.querySelector("#educationChart"), educationOptions);

            educationChart.render();
            //Education IQ Distribution Chart -- END

            //Field IQ Distribution Chart -- START
            var fieldOptions = {
                series: [{
                    name: '{{getLangValue('test_result.average_iq')}}',
                    data: [{
                        x: '{{getLangValue('study_levels.primary_education')}}',
                        y: 94
                    },{
                        x: '{{getLangValue('study_levels.agriculture')}}',
                        y: 97
                    },{
                        x: '{{getLangValue('study_levels.architecture_and_urbanism')}}',
                        y: 100
                    }, {
                        x: '{{getLangValue('study_levels.art_and_design')}}',
                        y: 102
                    }, {
                        x: '{{getLangValue('study_levels.commercial_and_management')}}',
                        y: 106
                    }, {
                        x: '{{getLangValue('study_levels.education')}}',
                        y: 101
                    }, {
                        x: '{{getLangValue('study_levels.engineering_and_technology')}}',
                        y: 108
                    }, {
                        x: '{{getLangValue('study_levels.geography_and_geology')}}',
                        y: 99
                    }, {
                        x: '{{getLangValue('study_levels.letters_and_culture')}}',
                        y: 100
                    }, {
                        x: '{{getLangValue('study_levels.languages_and_philology')}}',
                        y: 99
                    }, {
                        x: '{{getLangValue('study_levels.law')}}',
                        y: 103
                    }, {
                        x: '{{getLangValue('study_levels.math_and_computer_sciences')}}',
                        y: 109
                    }, {
                        x: '{{getLangValue('study_levels.medical_sciences')}}',
                        y: 108
                    }, {
                        x: '{{getLangValue('study_levels.natural_sciences')}}',
                        y: 106
                    }, {
                        x: '{{getLangValue('study_levels.social_sciences')}}',
                        y: 97
                    }, {
                        x: '{{getLangValue('study_levels.communication_and_information')}}',
                        y: 96
                    }, {
                        x: '{{getLangValue('test_result.you')}}',
                        y: {{\App\Helpers\Results::get($result->id,'total')}},
                        fillColor: '#3472ff'
                    }
                    ]
                }],
                xaxis: {
                    labels: {
                        formatter: function (value) {
                            return value + " IQ";
                        }
                    },
                },
                chart: {
                    height: 500,
                    type: 'bar'
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        borderRadius: 3,
                        columnWidth: '80%'
                    }
                },
                colors: ['#00784c'],
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'dark',
                        type: "vertical",
                        shadeIntensity: 0.15,
                        gradientToColors: undefined, // optional, if not defined - uses the shades of same color in series
                        inverseColors: true,
                        opacityFrom: 1,
                        opacityTo: 1,
                        stops: [0, 50, 100],
                        colorStops: []
                    }
                },
                dataLabels: {
                    enabled: true,
                    style: {
                        fontSize: '12px',
                        fontWeight: 'bold',
                        fontFamily: 'Nunito Sans, Helvetica, sans-serif'
                    }
                },
                legend: {
                    show: true,
                    showForSingleSeries: true,
                    showForNullSeries: true,
                    showForZeroSeries: true,
                    position: 'bottom',
                    horizontalAlign: 'center',
                    floating: false,
                    fontSize: '14px',
                    fontFamily: 'Nunito Sans',
                    fontWeight: 700,
                    formatter: undefined,
                    inverseOrder: false,
                    width: undefined,
                    height: undefined,
                    tooltipHoverFormatter: undefined,
                    customLegendItems: [],
                    offsetX: 0,
                    offsetY: 10,
                    labels: {
                        colors: undefined,
                        useSeriesColors: false
                    },
                    markers: {
                        width: 12,
                        height: 12,
                        strokeWidth: 0,
                        strokeColor: '#fff',
                        fillColors: undefined,
                        radius: 12,
                        customHTML: undefined,
                        onClick: undefined,
                        offsetX: 0,
                        offsetY: 0
                    }
                }
            }

            var fieldChart = new ApexCharts(document.querySelector("#fieldChart"), fieldOptions);

            fieldChart.render();
            //Field IQ Distribution Chart -- END
        </script>
    @endsection
@endsection
