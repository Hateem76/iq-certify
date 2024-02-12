@extends('frontend.layouts.main')
@section('title'){{getLangValue('about.page_title')}}@endsection
@section('main-container')
    <section class="subpage-title-wrapper c-section-bg">
        <div class="container">
            <div class="breadcrumbs-wrapper">
                <ul class="breadcrumbs">
                    <li><a href="index">{{getLangValue('about.home')}}</a></li>
                    <li class="breadcrumb-current"><span>{{getLangValue('about.about-us')}}</span></li>
                </ul>
            </div>
            <h1 class="subpage-title">{{getLangValue('about.about-us')}}</h1>
            <span class="subpage-subtitle">{{getLangValue('about.about-us_desc')}}</span>
        </div>
    </section>
    <section class="content-section subpage-section">
        <div class="container">
            <div class="s-content">
                <div class="about-container standard-content-container">
                    <div class="about-section-first">
                        <div class="row row-dm">
                            <div class="col-lg-6 col-12 col-dp">
                                <div class="standard-content-title-wrapper">
                                    <h2 class="standard-content-title">{{getLangValue('about.what_is_iq-certify')}}</h2>
                                </div>
                                <p class="about-intro-text">{{getLangValue('about.iq-certify_desc')}}</p>
                            </div>
                            <div class="col-lg-6 col-12 col-dp">
                                <img src="{{asset('panel/img/about-us-img.png')}}" class="img-fluid about-us-img" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="about-section-second">
                        <div class="test-info-columns">
                            <div class="row row-dm">
                                <div class="col-lg-4 col-12 col-dp col-m-mb">
                                    <div class="test-info-col">
                                        <div class="test-info-col-icon-wrapper">
                                            <div class="test-info-col-icon-content">
                                                <div class="test-info-col-icon-circle"></div>
                                                <img src="{{asset('panel/img/icons/about-us-icon-1.svg')}}" class="img-fluid test-info-col-icon" alt="" />
                                            </div>
                                        </div>
                                        <h3>{{getLangValue('about.start_test')}}</h3>
                                        <p>{{getLangValue('about.start_test_desc')}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12 col-dp col-m-mb">
                                    <div class="test-info-col">
                                        <div class="test-info-col-icon-wrapper">
                                            <div class="test-info-col-icon-content">
                                                <div class="test-info-col-icon-circle"></div>
                                                <img src="{{asset('panel/img/icons/about-us-icon-2.svg')}}" class="img-fluid test-info-col-icon" alt="" />
                                            </div>
                                        </div>
                                        <h3>{{getLangValue('about.download_report')}}</h3>
                                        <p>{{getLangValue('about.download_report_desc')}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12 col-dp">
                                    <div class="test-info-col">
                                        <div class="test-info-col-icon-wrapper">
                                            <div class="test-info-col-icon-content">
                                                <div class="test-info-col-icon-circle"></div>
                                                <img src="{{asset('panel/img/icons/about-us-icon-3.svg')}}" class="img-fluid test-info-col-icon" alt="" />
                                            </div>
                                        </div>
                                        <h3>{{getLangValue('about.analyze_iq')}}</h3>
                                        <p>{{getLangValue('about.analyze_iq_desc')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="before-footer-cta-wrapper">
        <div class="container">
            <div class="before-footer-cta-content">
                <div class="before-footer-cta-text">
                    <span>{{getLangValue('about.verify_iq_title')}} <br><span class="footer-cta-typed"></span></span>
                </div>
                <div class="before-footer-cta-btn-wrapper">
                    <a href="quizz" class="cta-btn cta-btn-xl animate__animated animate__pulse animate__infinite">
                        <span>{{getLangValue('about.start_iq_test_button')}}</span>
                        <img src="{{asset('panel/img/icons/login-3.svg')}}" class="img-fluid svg-icon icon-white cta-btn-icon" alt="Icon Go" />
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
