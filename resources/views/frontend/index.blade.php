@extends('frontend.layouts.main')
@section('title'){{getLangValue('home.page_title')}}@endsection
@section('main-container')
    <section class="content-section hero-section">
        <div class="container">
            <div class="s-content hero-content">
                <div class="row">
                    <div class="col-lg-6 col-12 col-m-mb">

                        <span class="before-hero-title">{{getLangValue('home.users_completed_test')}}</span>
                        <h1 class="hero-title">{{getLangValue('home.average_iq')}}</h1>
                        <h3 class="hero-subtitle">{{getLangValue('home.subtitle_iq')}}</h3>
                        <div class="hero-cta-wrapper">
                            <a href="quizz" class="cta-btn cta-btn-big">
                                <span>{{getLangValue('home.start_iq_button')}} </span>
                                <img src="{{asset('panel/img/icons/login-3.svg')}}" class="img-flui,'home'd svg-icon icon-white cta-btn-icon" alt="Icon Go" />
                            </a>
                        </div>
                        <ul class="hero-list">
                            <li><img src="{{asset('panel/img/icons/check-circle.svg')}}" class="img-fluid svg-icon icon-green hero-list-icon" alt="Checkmark" />{{getLangValue('home.subtext1')}}</li>
                            <li><img src="{{asset('panel/img/icons/check-circle.svg')}}" class="img-fluid svg-icon icon-green hero-list-icon" alt="Checkmark" />{{getLangValue('home.subtext2')}}</li>
                            <li><img src="{{asset('panel/img/icons/check-circle.svg')}}" class="img-fluid svg-icon icon-green hero-list-icon" alt="Checkmark" />{{getLangValue('home.subtext3')}}</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-12">
                        <img src="{{asset('panel/img/hero-img.png')}}" class="img-fluid hero-img" alt="Hero Image" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content-section last-results-section c-section-bg">
        <div class="container">
            <div class="s-content last-results-content">
                <div class="sc-title-wrapper text-center">
                    <h2 class="section-title">{{getLangValue('home.latest_results')}}   </h2>
                </div>
                <div class="last-results-wrapper">
                    <div class="row">
                        @foreach($quiz as $row)
                            <div class="last-results-wrapper-col col-lg-4 my-2">
                                <div class="lrw-col-content">
                                    <div class="lrw-item">
                                        <div class="lrw-item-l">
                                            <img src="{{\App\Helpers\Results::CountryFlag($row->user->country)}}" class="img-fluid flag-icon" alt="Spain" />
                                            <div class="lrw-item-date-name">
                                                <div class="lrw-item-name">{{$row->user->name}}</div>
                                                <div class="lrw-item-date">

                                                        <?php
                                                        $date = Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at, $timezone);
                                                        $date->setTimezone('UTC');
                                                        ?>
                                                    {{ $date->format('d/m/Y H:i') }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="lrw-item-r">
                                            <div class="lrw-item-score"><span>{{getLangValue('home.iq_score')}}</span><span class="lrq-score-val">{{ App\Helpers\Results::Get($row->id,'total',$row->quiz->id)}}</span></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content-section home-about-section">
        <div class="container">
            <div class="s-content last-results-content">
                <div class="sc-title-wrapper text-center">
                    <h2 class="section-title">IQ Certify</h2>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-padding-right-d">
                        <p class="home-about-text">{{getLangValue('home.iqcertify_desc')}}</p>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{asset('panel/img/change-illustration.png')}}" class="img-fluid" alt="Spain" />
                    </div>
                </div>
                <div class="row home-about-row">
                    <div class="col-lg-4">
                        <div class="home-about-col col-m-mb">
                            <div class="hac-number">1.  </div>
                            <div class="hac-title">{{getLangValue('home.step1_title')}} </div>
                            <div class="hac-text">{{getLangValue('home.step1_desc')}}</div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="home-about-col col-m-mb">

                            <div class="hac-number">2.</div>
                            <div class="hac-title">{{getLangValue('home.step2_title')}} </div>
                            <div class="hac-text">{{getLangValue('home.step2_desc')}}</div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="home-about-col">
                            <div class="hac-number">3. </div>
                            <div class="hac-title">{{getLangValue('home.step3_title')}} </div>
                            <div class="hac-text">{{getLangValue('home.step3_desc')}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content-section home-about-section c-section-bg">
        <div class="container">
            <div class="s-content last-results-content">
                <div class="row">
                    <div class="col-lg-4 col-padding-right-d">
                        <div class="sc-title-wrapper sc-title-padding-s">

                            <h2 class="section-title section-title-s">{{getLangValue('home.score_distribution_title')}}  </h2>
                        </div>
                        <p class="score-distribution-text">{{getLangValue('home.score_distribution_desc')}} </p>
                    </div>
                    <div class="col-lg-8">
                        <h4 class="chart-title">{{getLangValue('home.score_distribution_subtitle')}} </h4>
                        <div id="worldPopulationChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="before-footer-cta-wrapper">
        <div class="container">
            <div class="before-footer-cta-content">
                <div class="before-footer-cta-text">
                    <span>{{getLangValue('home.verify_iq_title')}}<br><span class="footer-cta-typed"></span></span>
                </div>
                <div class="before-footer-cta-btn-wrapper">
                    <a href="quizz" class="cta-btn cta-btn-xl animate__animated animate__pulse animate__infinite">
                        <span>{{getLangValue('home.start_iq_test_button')}}</span>
                        <img src="{{asset('panel/img/icons/login-3.svg')}}" class="img-fluid svg-icon icon-white cta-btn-icon" alt="Icon Go" />
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">

        //World Population IQ Distribution Chart -- START
        var worldPopulationOptions = {
            series: [{
                name: '{{getLangValue('home.percentaje_iq_buttom')}}',
                data: [
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
                ]
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
                        height: 200,
                        type: 'bar'
                    }
                }
            }]
        }

        var worldPopulationChart = new ApexCharts(document.querySelector("#worldPopulationChart"), worldPopulationOptions);

        worldPopulationChart.render();
        //World Population IQ Distribution Chart -- END
    </script>
@endsection
